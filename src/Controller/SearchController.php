<?php

namespace App\Controller;

use App\Repository\CarroRepository;
use App\Repository\CasaRepository;
use App\Repository\ExcursionRepository;
use App\Repository\PaqueteRepository;
use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends Controller
{
    /**
     * @Route("/search", name="search")
     */
    public function index()
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    /**
     * @Route("/generic_search", name="generic_search")
     */
    public function genericSearch(Request $request, DataService $query)
    {
        $data = $query->returnGenericSearchData($request);
        return $this->render('lista/index.html.twig', ['base' => 'false', 'type' => 'search', 'data' => $data]);
    }

    /**
     * @Route("/advanced_search", name="advanced_search")
     */
    public function advancedSearch(Request $request, DataService $query)
    {
        if ($request->get('status')) {
            $results = $query->returnAdvancedSearchData($request);
            $this->get('session')->set('search_results', $results);
        }else {
            $results=$this->get('session')->get('search_results');
        }
        $paginator = $this->get('knp_paginator');
        $advancedData = $paginator->paginate($results, $request->query->getInt('page', 1), 6);
        /*$cant = $request->get('cantidadP');
        $entrada = new \DateTime($request->get('fechaEntrada'));
        $salida = new \DateTime($request->get('fechaSalida'));
        $precio = $request->get('precio');
        $servicio = $request->get('servicios');
        $dias = $entrada->diff($salida)->days;
        if ($cant == 1) {
            $selectorPrecio = 'precio1';
        } elseif ($cant == 2) {
            $selectorPrecio = 'precio2';
        } elseif ($cant == 3) {
            $selectorPrecio = 'precio3';
        } else {
            $selectorPrecio = 'precio4';
        }*/
        return $this->render('lista/index.html.twig', ['base' => 'false', 'type' => 'search', 'data' => $advancedData]);
    }

    public function findCasa(Request $request, CasaRepository $casaRepository)
    {

    }

    public function findCarro(Request $request, CarroRepository $carroRepository)
    {

    }

    public function findExcursion(Request $request, ExcursionRepository $excursionRepository)
    {

    }

    public function findPaquete(Request $request, PaqueteRepository $paqueteRepository)
    {

    }
}
