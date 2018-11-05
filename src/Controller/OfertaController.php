<?php

namespace App\Controller;

use App\Entity\Comentario;
use App\Repository\CarroRepository;
use App\Repository\CasaRepository;
use App\Repository\ComentarioRepository;
use App\Repository\ExcursionRepository;
use App\Repository\PaqueteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OfertaController extends Controller
{
    /**
     * @Route("/oferta", name="oferta")
     */
    public function ofertaCasa(Request $request,CarroRepository $carroRepository, CasaRepository $casaRepository, ExcursionRepository $excursionRepository,PaqueteRepository $paqueteRepository)
    {

        $type=$request->get('type');
        if ($type == 'casa') {
            $object = $casaRepository->find($request->get('id'));
        } elseif ($type == 'carro') {
            $object = $carroRepository->find($request->get('id'));
        } elseif ($type == 'excursion') {
            $object = $excursionRepository->find($request->get('id'));
        } else {
            $object = $paqueteRepository->find($request->get('id'));
        }
        return $this->render('oferta/'.$type.'.html.twig', [
            'controller_name' => 'OfertaController',
            'base' => 'false',
            'object' => $object,
        ]);
    }




}
