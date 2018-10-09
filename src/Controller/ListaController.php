<?php

namespace App\Controller;

use App\Repository\CarroRepository;
use App\Repository\CasaRepository;
use App\Repository\SistemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ListaController extends Controller
{
    /**
     * @Route("/lista", name="lista")
     */


        public function index(SistemRepository $sistemRepository,CarroRepository $carroRepository,CasaRepository $casaRepository)
    {
        if ($this->get('session')->get('language') != 'en') {
            $this->get('session')->set('language', 'es');
        }
        $carros=$carroRepository->findBy(['active'=>true],['valoracion'=>'DESC'],3);
        $casas=$casaRepository->findBy(['active'=>true],['valoracion'=>'DESC']);


        // Every template name also has two extensions that specify the format and
        // engine for that template.
        // See https://symfony.com/doc/current/templating.html#template-suffix
        return $this->render('lista/index.html.twig',['base'=>'true','carros'=>$carros,'casas'=>$casas]);
    }



}
