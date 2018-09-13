<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin_cars", name="admin_cars")
     */
    public function cars(){
        return $this->render('admin/cars.html.twig');
    }

    /**
     * @Route("/admin_houses", name="admin_houses")
     */
    public function houses(){
        return null;
    }

    /**
     * @Route("/admin_houses", name="admin_houses")
     */
    public function pakages(){
        return null;
    }

}
