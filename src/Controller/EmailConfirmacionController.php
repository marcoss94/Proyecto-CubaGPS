<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class EmailConfirmacionController extends Controller
{
    /**
     * @Route("/email/confirmacion", name="email_confirmacion")
     */
    public function index()
    {
        return $this->render('email_confirmacion/index.html.twig', [
            'controller_name' => 'EmailConfirmacionController',
        ]);
    }
}
