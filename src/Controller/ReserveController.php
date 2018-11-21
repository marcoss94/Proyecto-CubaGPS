<?php

namespace App\Controller;

use App\Entity\Reserva;
use App\Repository\CasaRepository;
use App\Repository\ExcursionRepository;
use App\Repository\PaqueteRepository;
use App\Repository\ReservaRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReserveController extends Controller
{
    /**
     * @Route("/reserve", name="reserve")
     */
    public function index()
    {
        return $this->render('reserve/index.html.twig', [
            'controller_name' => 'ReserveController',
        ]);
    }

    /**
     * @Route("/admin/confirm_reserve", name="confirm_reserve")
     */
    public function confirm_reserve(Request $request, ReservaRepository $reservaRepository, UserRepository $userRepository, \Swift_Mailer $mailer)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $userRepository->find($request->get('user'));
        $preReservas = $reservaRepository->findBy(['usuario' => $user, 'status' => 'pre']);
        $text = $request->get('text');
        foreach ($preReservas as $preReserva) {
            if ($request->get($preReserva->getId())) {
                $preReserva->setStatus('confirmed');
                $em->persist($preReserva);
            } else {
                $em->remove($preReserva);
            }
        }
        $em->flush();
        $message = (new \Swift_Message())
            ->setSubject('Reservation')
            ->setTo($user->getEmail())
            ->setFrom('cubagps@gmail.com')
            ->setBody($this->renderView(
            // templates/emails/registration.html.twig
                'email/confirmReserve.html.twig',
                array('name' => $preReservas)
            ),
                'text/html');
//        $message = (new \Swift_Message('Reservation'))
//            ->setFrom('cubagps@gmail.com')
//            ->setTo($reserva->getUsuario()->getEmail())
//            ->setBody(
//                $this->renderView(
//                // templates/emails/registration.html.twig
//                    'email/confirmReserve.html.twig',
//                    array('name' => $name)
//                ),
//                'text/html'
//            )
//        ;
        $mailer->send($message);
        return $this->redirectToRoute('reservasnoconfirmadas');
    }

    public function changeEmailTo($email, $user)
    {
        $em = $this->getDoctrine()->getManager();
        $user->setEmail($email);
        $em->persist($user);
        $em->flush();
    }

    /**
     * @Route("/reserve/casa", name="reserva_casa")
     */
    public function reserva_casa(CasaRepository $casaRepository, Request $request, UserRepository $userRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $casa = $casaRepository->find($request->get('objectId'));
        $cantidadAdultos = $request->get('cantA');
        $cantidadChildren = $request->get('cantN');
        $entrada = new \DateTime($request->get('entrada'));
        $salida = new \DateTime($request->get('salida'));
        $diff = $entrada->diff($salida);
        $days = $diff->days == 0 ? 1 : $diff->days;
        $habitaciones = [];
        $costo = 0;
        foreach ($casa->getHabitaciones() as $habitacion) {
            if ($request->get($habitacion->getId())) {
                $habitaciones[] = $habitacion->getId();
                $costo += $habitacion->getPrecio() * $days;
            }
        }
        $reserve = new Reserva();
        $reserve->setCantPersonas($cantidadAdultos + $cantidadChildren);
        $reserve->setChildren($cantidadChildren);
        $reserve->setCommponent($casa);
        $reserve->setCosto($costo);
        $reserve->setStartAt($entrada);
        $reserve->setEndAt($salida);
        $reserve->setUsuario($this->getUser());
        $reserve->setHabitaciones($habitaciones);
        $user = $userRepository->find($this->getUser()->getId());
        $this->changeEmailTo($request->get('email'), $user);
        $em->persist($reserve);
        $em->flush();
        $message = [];
        $error = [];
        $message[0] = 'true';
        $message[1] = 'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta';
        $message[2] = 'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        return $this->render('oferta/casa.html.twig', [
            'object' => $casa,
            'message' => $message,
            'error' => $error
        ]);
    }

    /**
     * @Route("/reserve/excursion", name="reserva_excursion")
     */
    public function reserva_excursion(ExcursionRepository $excursionRepository, Request $request, UserRepository $userRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $excursion = $excursionRepository->find($request->get('objectId'));
        $cantidadAdultos = $request->get('cantA');
        $entrada = new \DateTime($request->get('entrada'));
        if ($cantidadAdultos == 1) {
            $costo = $excursion->getPrecio1();
        } elseif ($cantidadAdultos == 2) {
            $costo = $excursion->getPrecio2() * 2;
        } elseif ($cantidadAdultos == 3) {
            $costo = $excursion->getPrecio3() * 3;
        } else {
            $costo = $excursion->getPrecio4() * $cantidadAdultos;
        }
        $reserve = new Reserva();
        $reserve->setCantPersonas($cantidadAdultos);
        $reserve->setCommponent($excursion);
        $reserve->setCosto($costo);
        $reserve->setStartAt($entrada);
        $reserve->setUsuario($this->getUser());
        $user = $userRepository->find($this->getUser()->getId());
        $this->changeEmailTo($request->get('email'), $user);
        $em->persist($reserve);
        $em->flush();
        $message = [];
        $error = [];
        $message[0] = 'true';
        $message[1] = 'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta';
        $message[2] = 'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        return $this->render('oferta/excursion.html.twig', [
            'object' => $excursion,
            'message' => $message,
            'error' => $error
        ]);
    }

    /**
     * @Route("/reserve/paquete", name="reserva_paquete")
     */
    public function reserva_paquete(PaqueteRepository $paqueteRepository, UserRepository $userRepository, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paquete = $paqueteRepository->find($request->get('objectId'));
        $cantidadAdultos = $request->get('cantA');
        $entrada = new \DateTime($request->get('entrada'));
        if ($cantidadAdultos == 1) {
            $costo = $paquete->getPrecio1();
        } elseif ($cantidadAdultos == 2) {
            $costo = $paquete->getPrecio2() * 2;
        } elseif ($cantidadAdultos == 3) {
            $costo = $paquete->getPrecio3() * 3;
        } else {
            $costo = $paquete->getPrecio4() * $cantidadAdultos;
        }
        $reserve = new Reserva();
        $reserve->setCantPersonas($cantidadAdultos);
        $reserve->setCommponent($paquete);
        $reserve->setCosto($costo);
        $reserve->setStartAt($entrada);
        $reserve->setUsuario($this->getUser());
        $user = $userRepository->find($this->getUser()->getId());
        $this->changeEmailTo($request->get('email'), $user);
        $em->persist($reserve);
        $em->flush();
        $message = [];
        $error = [];
        $message[0] = 'true';
        $message[1] = 'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta';
        $message[2] = 'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        return $this->render('oferta/paquete.html.twig', [
            'object' => $paquete,
            'message' => $message,
            'error' => $error
        ]);
    }

    /**
     * @Route("/admin/reservasnoconfirmadas", name="reservasnoconfirmadas")
     */
    public function reservasnoconfirmadas(UserRepository $userRepository, ReservaRepository $reservaRepository)
    {
        $users = $userRepository->findAll();
        $usersList = [];
        foreach ($users as $user) {
            if (count($reservaRepository->findBy(['status' => 'pre', 'usuario' => $user]))) {
                $usersList[$user->getId()]['reserve'] = $reservaRepository->findBy(['status' => 'pre', 'usuario' => $user]);
                $usersList[$user->getId()]['user'] = $user;
                $totalCost = 0;
                foreach ($usersList[$user->getId()]['reserve'] as $item) {
                    $totalCost += $item->getCosto();
                }
                $usersList[$user->getId()]['price'] = $totalCost;
            }
        }
        return $this->render('reserve/reservasnoconfirmadas.html.twig', [
            'users' => $usersList
        ]);
    }


    /**
     * @Route("/admin/reservasconfirmadas", name="reservasconfirmadas")
     */
    public function reservasconfirmadas()
    {
        return $this->render('reserve/reservasconfirmadas.html.twig', [

        ]);
    }


    /**
     * @Route("/admin/pagos", name="pagos")
     */
    public function pagos()
    {
        return $this->render('reserve/pagos.html.twig', [

        ]);
    }


}
