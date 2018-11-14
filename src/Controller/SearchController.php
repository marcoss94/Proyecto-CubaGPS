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
        $data = $query->returnAdvancedSearchData($request);
        dump($data);
        return $this->render('lista/index.html.twig', ['base' => 'false', 'type' => 'search', 'data' => $data]);
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
