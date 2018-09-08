<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DateController extends Controller
{
    /**
     * @Route("/date", name="date")
     */
    public function index()
    {
        return $this->render('date/index.html.twig', [
            'controller_name' => 'DateController',
        ]);
    }
}
