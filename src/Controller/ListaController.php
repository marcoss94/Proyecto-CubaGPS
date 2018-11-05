<?php

namespace App\Controller;

use App\Repository\CarroRepository;
use App\Repository\CasaRepository;
use App\Repository\ExcursionRepository;
use App\Repository\PaqueteRepository;
use App\Repository\SistemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListaController extends Controller
{

    /**
     * @Route("/lista", name="lista")
     */
    public function index(Request $request, CarroRepository $carroRepository, CasaRepository $casaRepository, ExcursionRepository $excursionRepository, PaqueteRepository $paqueteRepository)
    {
        if ($request->get('type') == 'casa') {
            $objects = $casaRepository->findBy(['active' => true], ['valoracion' => 'DESC']);
            $type='casa';
        } elseif ($request->get('type') == 'carro') {
            $objects = $carroRepository->findBy(['active' => true], ['valoracion' => 'DESC']);
            $type='carro';
        } elseif ($request->get('type') == 'excursion') {
            $objects = $excursionRepository->findBy(['active' => true], ['valoracion' => 'DESC']);
            $type='excursion';
        } else {
            $objects = $paqueteRepository->findBy(['active' => true], ['valoracion' => 'DESC']);
            $type='paquete';
        }
        return $this->render('lista/index.html.twig', ['base' => 'false', 'objects' => $objects,'type'=>$type]);
    }


}
