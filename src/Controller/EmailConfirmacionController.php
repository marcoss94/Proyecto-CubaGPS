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


    /**
     * @Route("/email/pagos", name="email_pagos")
     */
    public function email_pagos()
    {
        return $this->render('email_confirmacion/email_pagos.html.twig', [
            'controller_name' => 'EmailConfirmacionController',
        ]);
    }

    /**
     * @Route("/email/nopagos", name="email_noPagos")
     */
    public function email_nopagos()
    {
        return $this->render('email_confirmacion/email_noPagos.html.twig', [
            'controller_name' => 'EmailConfirmacionController',
        ]);
    }
}
