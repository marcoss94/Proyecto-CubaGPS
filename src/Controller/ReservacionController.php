<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ReservacionController extends Controller
{
    /**
     * @Route("/reservacion", name="reservacion")
     */
    public function index()
    {
        return $this->render('reservacion/index.html.twig', [
            'type' => 'casa',
        ]);
    }
}
