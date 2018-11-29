<?php

namespace App\Controller;

use App\Entity\Excursion;
use App\Entity\Paquete;
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
            if ($request->get('servicios') == 'servicio'){
                $type = ['Casa', 'Carro', 'Excursion', 'Paquete'];
            }else{
                $type=[$request->get('servicios')];
            }
            $precio = $request->get('precio') == ''?100000:(int)$request->get('precio');
            $cant = $request->get('cantidadP');
            $results = $query->returnAdvancedSearchData($request,$type);
            $postResults = [];
            foreach ($results as $object) {
                if (!in_array($object->getType(),$type)){
                    continue;
                }
                if ($object instanceof Paquete || $object instanceof Excursion) {
                    if ($cant == 1) {
                        $precioTotal = $object->getPrecio1() * $cant;
                    } elseif ($cant == 2) {
                        $precioTotal = $object->getPrecio2() * $cant;
                    } elseif ($cant == 3) {
                        $precioTotal = $object->getPrecio3() * $cant;
                    } else {
                        $precioTotal = $object->getPrecio4() * $cant;
                    }
                    if ($precioTotal <= $precio) {
                        $postResults[] = $object;
                    }
                } else {
                    $postResults[] = $object;
                }
            }
            $this->get('session')->set('search_results', $postResults);
            $results = $postResults;
        } else {
            $results = $this->get('session')->get('search_results');
        }
        $paginator = $this->get('knp_paginator');
        $advancedData = $paginator->paginate($results, $request->query->getInt('page', 1), 9);
        return $this->render('lista/index.html.twig', ['base' => 'false', 'type' => 'search', 'data' => $advancedData]);
    }

}
