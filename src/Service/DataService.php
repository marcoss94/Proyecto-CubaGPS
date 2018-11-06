<?php
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 03/11/2018
 * Time: 10:09
 */

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Casa;
use Symfony\Component\HttpFoundation\Request;


class DataService
{
    protected $em;
    protected $container;

    public function __construct(EntityManagerInterface $entityManager, ContainerInterface $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function returnData(Request $request)
    {
        $em = $this->em;
        $container=$this->container;
        $query = $em->createQuery(
            'SELECT 
            t.id,
            t.nombre,
            t.municipio,
            t.provincia,
            t.valoracionArray                       
            FROM App\Entity\Casa t 
            '
        );
        $paginator=$container->get('knp_paginator');
        $results = $paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );
        return ($results);
    }

}