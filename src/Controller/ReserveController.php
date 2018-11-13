<?php

namespace App\Controller;

use App\Entity\Reserva;
use App\Repository\CasaRepository;
use App\Repository\ContadorRepository;
use App\Repository\ExcursionRepository;
use App\Repository\PaqueteRepository;
use App\Repository\ReservaRepository;
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
     * @Route("/reserve/casa", name="reserva_casa")
     */
    public function reserva_casa(CasaRepository $casaRepository, Request $request, ContadorRepository $contadorRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $casa = $casaRepository->find($request->get('objectId'));
        $cantidadAdultos = $request->get('cantA');
        $cantidadChildren = $request->get('cantN');
        $entrada = new \DateTime($request->get('entrada'));
        $salida = new \DateTime($request->get('salida'));
        $diff = $entrada->diff($salida);
        $days = $diff->days == 0 ? 1 : $diff->days;
        $contador = $contadorRepository->find(1);
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
        $em->persist($reserve);
        $contador->setPreReserve($contador->getPreReserve() + 1);
        $em->persist($contador);
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
    public function reserva_excursion(ExcursionRepository $excursionRepository, Request $request, ContadorRepository $contadorRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $excursion = $excursionRepository->find($request->get('objectId'));
        $cantidadAdultos = $request->get('cantA');
        $entrada = new \DateTime($request->get('entrada'));
        $contador = $contadorRepository->find(1);
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
        $em->persist($reserve);
        $contador->setPreReserve($contador->getPreReserve() + 1);
        $em->persist($contador);
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
    public function reserva_paquete(PaqueteRepository $paqueteRepository, Request $request, ContadorRepository $contadorRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $paquete = $paqueteRepository->find($request->get('objectId'));
        $cantidadAdultos = $request->get('cantA');
        $entrada = new \DateTime($request->get('entrada'));
        $contador = $contadorRepository->find(1);
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
        $em->persist($reserve);
        $contador->setPreReserve($contador->getPreReserve() + 1);
        $em->persist($contador);
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
    public function reservasnoconfirmadas(ReservaRepository $reservaRepository, ContadorRepository $contadorRepository)
    {
        $contador = $contadorRepository->find(1);
        $contador->setPreReserve(0);
        $em = $this->getDoctrine()->getManager();
        $em->persist($contador);
        $em->flush();
        $preReserves = $reservaRepository->findBy(['status' => 'pre']);
        return $this->render('reserve/reservasnoconfirmadas.html.twig', [
            'preReserves' => $preReserves
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
