<?php

namespace App\Controller;

use App\Entity\Reserva;
use App\Repository\CasaRepository;
use App\Repository\ContadorRepository;
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
    public function reserva_casa(CasaRepository $casaRepository, Request $request,ContadorRepository $contadorRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $casa = $casaRepository->find($request->get('objectId'));
        $cantidadAdultos = $request->get('cantA');
        $cantidadChildren = $request->get('cantN');
        $entrada = new \DateTime($request->get('entrada'));
        $salida = new \DateTime($request->get('salida'));
        $diff = $entrada->diff($salida);
        $days = $diff->days;
        $type='habitacion';
        $contador=$contadorRepository->find(1);
        foreach ($casa->getHabitaciones() as $habitacion) {
            if ($request->get($habitacion->getId())) {
                $reserve = new Reserva();
                $reserve->setCantPersonas($cantidadAdultos + $cantidadChildren);
                $reserve->setChildren($cantidadChildren);
                $reserve->setCommponent($habitacion);
                $costo=$habitacion->getPrecio()*$days;
                $reserve->setCosto($costo);
                $reserve->setStartAt($entrada);
                $reserve->setEndAt($entrada);
                $reserve->setType($type);
                $reserve->setUsuario($this->getUser());
                $em->persist($reserve);
                $contador->setPreReserve($contador->getPreReserve()+1);
                $em->persist($contador);
            }
        }
        $em->flush();
        $message=[];
        $error=[];
        $message[0]='true';
        $message[1]='Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta';
        $message[2]='Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        return $this->render('oferta/casa.html.twig', [
            'object' => $casa,
            'message' => $message,
            'error' => $error
        ]);
    }


}
