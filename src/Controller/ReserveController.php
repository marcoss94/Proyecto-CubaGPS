<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Entity\Reserva;
use App\Entity\User;
use App\Repository\CarroRepository;
use App\Repository\CasaRepository;
use App\Repository\DisplayableComponentRepository;
use App\Repository\ExcursionRepository;
use App\Repository\PaqueteRepository;
use App\Repository\ReservaRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function confirm_reserve(Request $request, ReservaRepository $reservaRepository, UserRepository $userRepository, PaqueteRepository $paqueteRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $userRepository->find($request->get('user'));
        $preReservas = $reservaRepository->findBy(['usuario' => $user, 'status' => ['pre', 'confirmed']]);
        foreach ($preReservas as $preReserva) {
            if ($request->get($preReserva->getId())) {
                $preReserva->setStatus('confirmed');
                $em->persist($preReserva);
            } else {
                $preReserva->setStatus('pre');
            }
        }
        $paquetes = $paqueteRepository->findAll();
        $em->flush();
        return $this->render('reserve/constructEmail.html.twig', ['user' => $user, 'paquetes' => $paquetes]);
    }

    /**
     * @Route("/admin/send_email", name="send_email")
     */
    public function send_email(Request $request, ReservaRepository $reservaRepository, UserRepository $userRepository, \Swift_Mailer $mailer, DisplayableComponentRepository $componentRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $userRepository->find($request->get('userId'));
        $reserves = $reservaRepository->findBy(['usuario' => $user, 'status' => ['pre', 'confirmed']]);
        $rechazos = [];
        $confirmedReserves = [];
        $adj = [];
        if ($request->get('adjuntos') != '') {
            $adjArray = explode(',', $request->get('adjuntos'));
            foreach ($adjArray as $id) {
                $adj[] = $componentRepository->find($id);
            }
        }
        foreach ($reserves as $reserve) {
            if ($reserve->getStatus() == 'pre') {
                $rechazos[] = $reserve;
                $em->remove($reserve);
            } else {
                $reserve->setStatus('pending');
                $em->persist($reserve);
                $confirmedReserves[] = $reserve;
            }
        }
        $next = $user->getIdioma() == 'es' ? 'index' : 'index_en';
        $em->flush();
        $message = (new \Swift_Message())
            ->setSubject('Reservation')
            ->setTo($user->getEmail())
            ->setFrom('contact@travelcubagps.com')
            ->setBody($this->renderView(
                'email_confirmacion/' . $next . '.html.twig',
                ['user' => $user,
                    'adjuntos' => $adj,
                    'rechazos' => $rechazos,
                    'textoAdicional' => $request->get('textoAdicional'),
                    'reservas' => $confirmedReserves
                ]
            ),
                'text/html');

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
    public function reserva_casa(CasaRepository $casaRepository, Request $request, UserRepository $userRepository, \Swift_Mailer $mailer)
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
        $message['type'] = 'success';
        $message['head'] = ($user->getIdioma() == 'es') ?
            'Gracias' : 'Thanks';
        $message['body'] = ($user->getIdioma() == 'es') ?
            'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta'
            : 'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        $this->sendAdminEmail($reserve, $mailer);
        return $this->redirectToRoute('blog_index', ['message' => $message]);
    }

    /**
     * @Route("/reserve/excursion", name="reserva_excursion")
     */
    public function reserva_excursion(ExcursionRepository $excursionRepository, Request $request, UserRepository $userRepository, \Swift_Mailer $mailer)
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
        $message['type'] = 'success';
        $message['head'] = ($user->getIdioma() == 'es') ?
            'Gracias' : 'Thanks';
        $message['body'] = ($user->getIdioma() == 'es') ?
            'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta'
            : 'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        $this->sendAdminEmail($reserve, $mailer);
        return $this->redirectToRoute('blog_index', ['message' => $message]);
    }

    /**
     * @Route("/reserve/paquete", name="reserva_paquete")
     */
    public function reserva_paquete(PaqueteRepository $paqueteRepository, UserRepository $userRepository, Request $request, \Swift_Mailer $mailer)
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
        $agregarDias = $paquete->getDuracion();
        $salida = new \DateTime($request->get('entrada'));
        $salida->add(new \DateInterval("P{$agregarDias}D"));
        $reserve->setEndAt($salida);
        $reserve->setUsuario($this->getUser());
        $user = $userRepository->find($this->getUser()->getId());
        $this->changeEmailTo($request->get('email'), $user);
        $em->persist($reserve);
        $em->flush();
        $message = [];
        $message['type'] = 'success';
        $message['head'] = ($user->getIdioma() == 'es') ?
            'Gracias' : 'Thanks';
        $message['body'] = ($user->getIdioma() == 'es') ?
            'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta'
            : 'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        $this->sendAdminEmail($reserve, $mailer);
        return $this->redirectToRoute('blog_index', ['message' => $message]);
    }

    /**
     * @Route("/admin/reservasnoconfirmadas", name="reservasnoconfirmadas")
     */
    public function reservasnoconfirmadas(UserRepository $userRepository, ReservaRepository $reservaRepository)
    {
        $users = $userRepository->findAll();
        $usersList = [];
        foreach ($users as $user) {
            if (count($reservaRepository->findBy(['status' => ['pre', 'confirmed'], 'usuario' => $user]))) {
                $usersList[$user->getId()]['reserve'] = $reservaRepository->findBy(['status' => ['pre', 'confirmed'], 'usuario' => $user]);
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
     * @Route("/admin/reservasactivas", name="reservasactivas")
     */
    public function reservasactivas(UserRepository $userRepository, ReservaRepository $reservaRepository)
    {
        $users = $userRepository->findAll();
        $usersList = [];
        foreach ($users as $user) {
            if (count($reservaRepository->findBy(['status' => 'payed', 'usuario' => $user]))) {
                $usersList[$user->getId()]['reserve'] = $reservaRepository->findBy(['status' => 'payed', 'usuario' => $user]);
                $usersList[$user->getId()]['user'] = $user;
                $totalCost = 0;
                foreach ($usersList[$user->getId()]['reserve'] as $item) {
                    $totalCost += $item->getCosto();
                }
                $usersList[$user->getId()]['price'] = $totalCost;
            }
        }
        return $this->render('reserve/reservasactivas.html.twig', [
            'users' => $usersList
        ]);
    }

    /**
     * @Route("/admin/reservascanceladas", name="reservascanceladas")
     */
    public function reservascanceladas(UserRepository $userRepository, ReservaRepository $reservaRepository)
    {
        $users = $userRepository->findAll();
        $usersList = [];
        foreach ($users as $user) {
            if (count($reservaRepository->findBy(['status' => 'canceled', 'usuario' => $user]))) {
                $usersList[$user->getId()]['reserve'] = $reservaRepository->findBy(['status' => 'canceled', 'usuario' => $user]);
                $usersList[$user->getId()]['user'] = $user;
                $totalCost = 0;
                foreach ($usersList[$user->getId()]['reserve'] as $item) {
                    $totalCost += $item->getCosto();
                }
                $usersList[$user->getId()]['price'] = $totalCost;
            }
        }
        return $this->render('reserve/reservascanceladas.html.twig', [
            'users' => $usersList
        ]);
    }

    /**
     * @Route("/reserve/show_confirmed_reserves", name="show_confirmed_reserves")
     */
    public function showReserve(ReservaRepository $reservaRepository)
    {
        $user = $this->getUser();
        $preReserves = $reservaRepository->findBy(['usuario' => $user, 'status' => ['confirmed', 'pending']]);
        $price = 0;
        foreach ($preReserves as $p) {
            $price += $p->getCosto();
        }
        if (count($preReserves)) {
            return $this->render('reserve/show_confirmed_reserve.html.twig', ['reserves' => $preReserves, 'base' => 'false', 'precio' => $price]);
        } else {
            return $this->redirectToRoute('blog_index');
        }
    }

    /**
     * @Route("/reserve/show_active_reserves", name="show_active_reserves")
     */
    public function activeReserves(ReservaRepository $reservaRepository)
    {
        $user = $this->getUser();
        $reserves = $reservaRepository->findBy(['usuario' => $user, 'status' => 'payed']);
        if (count($reserves)) {
            return $this->render('reserve/show_active_reserve.html.twig', ['reserves' => $reserves, 'base' => 'false']);
        } else {
            return $this->redirectToRoute('blog_index');
        }
    }


    /**
     * @Route("/admin/reservasconfirmadas", name="reservasconfirmadas")
     */
    public function reservasconfirmadas(UserRepository $userRepository, ReservaRepository $reservaRepository)
    {
        $users = $userRepository->findAll();
        $usersList = [];
        foreach ($users as $user) {
            if (count($reservaRepository->findBy(['status' => 'pending', 'usuario' => $user]))) {
                $usersList[$user->getId()]['reserve'] = $reservaRepository->findBy(['status' => 'pending', 'usuario' => $user]);
                $usersList[$user->getId()]['user'] = $user;
                $totalCost = 0;
                foreach ($usersList[$user->getId()]['reserve'] as $item) {
                    $totalCost += $item->getCosto();
                }
                $usersList[$user->getId()]['price'] = $totalCost;
            }
        }
        return $this->render('reserve/reservasconfirmadas.html.twig', [
            'users' => $usersList
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

    /**
     * @Route("/admin/reserva_especial", name="reserva_especial")
     */
    public function reserva_especial(Request $request, UserRepository $userRepository)
    {
        $user = $userRepository->find($request->get('id'));
        return $this->render('reserve/reserve_especial.html.twig', [
            'user' => $user,
            'message' => 'none'
        ]);
    }

    /**
     * @Route("/admin/crear_reserva_especial", name="crear_reserva_especial")
     */
    public function crear_reserva_especial(Request $request, UserRepository $userRepository, DisplayableComponentRepository $displayableComponentRepository)
    {
        $next = 'admin/index.html.twig';
        $b = true;
        $message = 'La confirmación de prereserva se ha enviado al usuario';
        $user = $userRepository->find($request->get('userId'));
        if ($displayableComponentRepository->find($request->get('commponentId'))) {
            $commponent = $displayableComponentRepository->find($request->get('commponentId'));
            $price = $request->get('price');
            $fechaInicial = new \DateTime($request->get('fechaEntrada'));
            $fechaFinal = new \DateTime($request->get('fechaSalida'));
            $description = $request->get('description');
            $cantP = $request->get('cantP');
            if ($fechaInicial > $fechaFinal) {
                $message = 'La fecha de salida no puede ser después de la fecha de entrada';
                $next = 'reserve/reserve_especial.html.twig';
                $b = false;
            }
            $reserve = new Reserva();
            $reserve->setStatus('confirmed');
            $reserve->setType('esp');
            $reserve->setCantPersonas($cantP);
            $reserve->setCommponent($commponent);
            $reserve->setCosto($price);
            $reserve->setCreatedAt();
            $reserve->setDescripcion($description);
            $reserve->setStartAt($fechaInicial);
            $reserve->setEndAt($fechaFinal);
            $reserve->setUsuario($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reserve);
            $em->flush();
        } else {
            $next = 'reserve/reserve_especial.html.twig';
            $message = 'El id del servicio no coincide con ninguno de los existentes';
            $b = false;
        }
        if ($b) {
            return $this->redirectToRoute('admin');
        }
        return $this->render($next, [
            'user' => $user,
            'message' => $message,
        ]);

    }

    /**
     * @Route("/reserve/contact_special_reserve", name="contact_special_reserve")
     */
    public function contact_special_reserve(Request $request)
    {
        $contacto = new Contacto();
        $contacto->setCreatedAt();
        $id = $request->get('objectId');
        $contacto->setEmail($request->get('email'));
        $contacto->setNombre($this->getUser());
        $text = 'Solivitud de reserva especial, id del servicio solicitado: ' . $id . '. Cantidad de personas: ' . $request->get('cantPersRE') . ', Descripción: ' . $request->get('descriptionRE');
        $contacto->setTexto($text);
        $em = $this->getDoctrine()->getManager();
        $em->persist($contacto);
        $em->flush();
        return $this->redirectToRoute('blog_index');
    }

    /**
     * @Route("/reserve/reserve_car_exc", name="reserve_car_exc")
     */
    public function reserve_car_exc(Request $request, CarroRepository $carroRepository, \Swift_Mailer $mailer)
    {
        $car = $carroRepository->find($request->get('id'));
        $reserve = new Reserva();
        $reserve->setCreatedAt();
        $user = $this->getUser();
        $this->changeEmailTo($request->get('email'), $user);
        $reserve->setUsuario($user);
        $reserve->setCantPersonas($request->get('cantP'));
        $reserve->setCommponent($car);
        $reserve->setHoraInicial($request->get('desde'));
        $reserve->setHoraFinal($request->get('hasta'));
        $costo = ($request->get('hasta') - $request->get('desde')) * $car->getPrecio();
        $reserve->setCosto($costo);
        $reserve->setStartAt(new \DateTime($request->get('fecha')));
        $reserve->setType('exc');
        $em = $this->getDoctrine()->getManager();
        $em->persist($reserve);
        $em->flush();
        $message['type'] = 'success';
        $message['head'] = ($user->getIdioma() == 'es') ?
            'Gracias' : 'Thanks';
        $message['body'] = ($user->getIdioma() == 'es') ?
            'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta'
            : 'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        $this->sendAdminEmail($reserve, $mailer);
        return $this->redirectToRoute('blog_index', ['message' => $message]);
    }

    /**
     * @Route("/admin/ajax_find_offers", name="ajax_find_offers")
     */
    public function ajax_find_offers(Request $request, CasaRepository $casaRepository, CarroRepository $carroRepository, ExcursionRepository $excursionRepository)
    {
        $prov = $request->get('prov');
        $carros = $carroRepository->findBy(['provincia' => $prov], ['valoracion' => 'DESC']);
        $carrosArray = [];
        foreach ($carros as $item) {
            $carrosArray[] = ['nombre' => $item->getNombre(), 'id' => $item->getId()];

        }
        $casas = $casaRepository->findBy(['provincia' => $prov], ['valoracion' => 'DESC']);
        $casasArray = [];
        foreach ($casas as $item) {
            $casasArray[] = ['nombre' => $item->getNombre(), 'id' => $item->getId()];

        }
        $excursiones = $excursionRepository->findBy(['provincia' => $prov], ['valoracion' => 'DESC']);
        $excursionArray = [];
        foreach ($excursiones as $item) {
            $excursionArray[] = ['nombre' => $item->getNombre(), 'id' => $item->getId()];

        }
        $result = [$carrosArray, $casasArray, $excursionArray];
        $response = new JsonResponse();
        $response->setData(['result' => $result]);
        return $response;
    }

    /**
     * @Route("/reserve/cancel_pre_reserve", name="cancel_pre_reserve")
     */
    public function cancel_pre_reserve(Request $request, ReservaRepository $reservaRepository)
    {
        $reserve = $reservaRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($reserve);
        $em->flush();
        return $this->redirectToRoute('show_confirmed_reserves');
    }

    /**
     * @Route("/reserve/cancel_active_reserves", name="cancel_active_reserves")
     */
    public function cancel_active_reserves(Request $request, ReservaRepository $reservaRepository)
    {
        $reserve = $reservaRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $reserve->setStatus('canceled');
        $reserve->setCanceledAt();
        $em->persist($reserve);
        $em->flush();
        return $this->redirectToRoute('show_active_reserves');
    }

    /**
     * @Route("/admin/delete_active_reserve", name="delete_active_reserve")
     */
    public function delete_active_reserve(Request $request, ReservaRepository $reservaRepository)
    {
        $reserve = $reservaRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($reserve);
        $em->flush();
        return $this->redirectToRoute('reservascanceladas');
    }


    public function sendAdminEmail(Reserva $reserva, $mailer)
    {

        $message = (new \Swift_Message())
            ->setSubject('Solocitud de Reserva')
            ->setTo('lemueldiaz@travelcubagps.com')
            ->setFrom('contact@travelcubagps.com')
            ->setBody($this->renderView(
                'email_confirmacion/notificar_admin.html.twig',
                ['reserva' => $reserva]
            ),
                'text/html');
        $mailer->send($message);
        return;
    }

    /**
     * @Route("/admin/activar_reserva", name="activar_reserva")
     */
    public function activar_reserva(Request $request, ReservaRepository $reservaRepository, UserRepository $userRepository, \Swift_Mailer $mailer)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $userRepository->find($request->get('userId'));
        $reserves = $reservaRepository->findBy(['usuario' => $user, 'status' => 'pending']);
        $totalPrice = 0;
        $reservasMarcadas=[];
        foreach ($reserves as $reserva) {
            if($request->get($reserva->getId())){
            $reserva->setStatus('payed');
            $reserva->setPayedAt();
            $em->persist($reserva);
            $em->flush();
            $totalPrice += $reserva->getCosto();
            $reservasMarcadas[]=$reserva;
            }
        }
        $this->sendBautcher($user, $mailer, $reservasMarcadas, $totalPrice);
        return $this->redirectToRoute('reservasconfirmadas');
    }

    public function sendBautcher(User $client, $mailer, $reserves, $price)
    {
        $user = $client;
        $totalPrice = $price;
        $subject = $user->getIdioma() == 'es' ? 'Factura de servicios Cuba GPS' : 'Cuba GPS Utility bill';
        $message = (new \Swift_Message())
            ->setSubject($subject)
            ->setTo([$user->getEmail(),'lemueldiaz@travelcubagps.com'])
            ->setFrom('contact@travelcubagps.com')
            ->setBody($this->renderView(
                'blog/bautcher.html.twig',
                ['user' => $user,
                    'reservas' => $reserves,
                    'folio' => uniqid(),
                    'price' => $totalPrice,
                ]
            ),
                'text/html');
        $mailer->send($message);
        return;
    }


}
