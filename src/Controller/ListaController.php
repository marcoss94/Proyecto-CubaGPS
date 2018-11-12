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

class ListaController extends Controller
{

    /**
     * @Route("/lista", name="lista")
     */
    public function index(Request $request, DataService $query)
    {
        if ($request->get('type') == 'casa') {
            $data=$query->returnCasaData($request);
            $type='casa';
        } elseif ($request->get('type') == 'carro') {
            $data=$query->returnCarroData($request);
            $type='carro';
        } elseif ($request->get('type') == 'excursion') {
            $data=$query->returnExcursionData($request);
            $type='excursion';
        } else {
            $data=$query->returnPaqueteData($request);
            $type='paquete';
        }
        return $this->render('lista/index.html.twig', ['base' => 'false','type'=>$type,'data'=>$data]);
    }




}
