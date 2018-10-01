<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class OfertaController extends Controller
{
    /**
     * @Route("/oferta", name="oferta")
     */
    public function index()
    {
        return $this->render('oferta/index.html.twig', [
            'controller_name' => 'OfertaController','base'=>'false','oferta'=>'casa'
        ]);
    }
}
