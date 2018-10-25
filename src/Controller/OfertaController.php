<?php

namespace App\Controller;

use App\Repository\CasaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OfertaController extends Controller
{
    /**
     * @Route("/oferta_casa", name="oferta_casa")
     */
    public function ofertaCasa(Request $request,CasaRepository $casaRepository)
    {
        $casa=$casaRepository->find($request->get('id'));
        return $this->render('oferta/casa.html.twig', [
            'controller_name' => 'OfertaController','base'=>'false','oferta'=>'casa','casa'=>$casa
        ]);
    }
}
