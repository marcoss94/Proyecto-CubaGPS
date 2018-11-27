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

    public function returnCasaData(Request $request)
    {
        $em = $this->em;
        $container = $this->container;
        $query = $em->createQuery(
            'SELECT u,p FROM App\Entity\Casa u JOIN u.images  p'
        );
        $paginator = $container->get('knp_paginator');
        $results = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 6)
        );
        return ($results);
    }

    public function returnExcursionData(Request $request)
    {
        $em = $this->em;
        $container = $this->container;
        $query = $em->createQuery(
            'SELECT u,p FROM App\Entity\Excursion u JOIN u.images  p'
        );
        $paginator = $container->get('knp_paginator');
        $results = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 9)
        );
        return ($results);
    }

    public function returnCarroData(Request $request)
    {
        $em = $this->em;
        $container = $this->container;
        $query = $em->createQuery(
            'SELECT u,p FROM App\Entity\Carro u JOIN u.images  p'
        );
        $paginator = $container->get('knp_paginator');
        $results = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 9)
        );
        return ($results);
    }

    public function returnPaqueteData(Request $request)
    {
        $em = $this->em;
        $container = $this->container;
        $query = $em->createQuery(
            'SELECT u ,p FROM App\Entity\Paquete u JOIN u.images  p'
        );
        $paginator = $container->get('knp_paginator');
        $results = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 9)
        );
        return ($results);
    }

    public function returnGenericSearchData(Request $request)
    {
        $em = $this->em;
        $container = $this->container;
        $query = $em->createQuery(
            'SELECT u ,p FROM App\Entity\DisplayableComponent u JOIN u.images  p 
                      WHERE (u.name LIKE :text OR 
                      u.nombre LIKE :text OR
                      u.descripcion LIKE :text OR
                      u.description LIKE :text OR
                      u.municipio LIKE :text OR
                      u.provincia LIKE :text) 
                      AND 
                      (u NOT INSTANCE OF App\Entity\Habitacion AND u NOT INSTANCE OF App\Entity\Activity)
                      AND u.active = TRUE                       
                      ORDER BY u.valoracion DESC'
        )->setParameters(['text' => '%' . $request->get('searchText') . '%',
        ]);
        $paginator = $container->get('knp_paginator');
        $results = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 9)
        );
        return ($results);
    }

    public function returnAdvancedSearchData(Request $request)
    {
        $lugar = $request->get('lugar');
        $cant = $request->get('cantidadP');
        $entrada = new \DateTime($request->get('fechaEntrada'));
        $salida = new \DateTime($request->get('fechaSalida'));
        $dias = $entrada->diff($salida)->days;
        $em = $this->em;
        $query = $em->createQuery(
            'SELECT u ,p FROM App\Entity\DisplayableComponent u JOIN u.images  p 
                      WHERE (u.name LIKE :lugar OR 
                      u.nombre LIKE :lugar OR                      
                      u.municipio LIKE :lugar OR
                      u.provincia LIKE :lugar) 
                      AND 
                      (u NOT INSTANCE OF App\Entity\Habitacion AND u NOT INSTANCE OF App\Entity\Activity)
                      AND u.active = TRUE 
                      AND u.capacidad >= :cant
                      AND u.duracion <= :dias
                      ORDER BY u.valoracion DESC'
        )->setParameters([
            'lugar' => '%' . $lugar . '%',
            'cant' => $cant,
            'dias' => $dias,
        ]);
        return $query->getResult();
    }

    public function returnTransferSearchData(Request $request,$prov)
    {
        $em = $this->em;
        $container = $this->container;
        $query = $em->createQuery(
            'SELECT u ,p FROM App\Entity\Carro u JOIN u.images  p 
                      WHERE u.capacidad >= :cantP 
                      AND u.capacidad/3-5 < :cantP 
                      AND u.provincia IN (:prov)
                      AND u.transfer = TRUE                                           
                      ORDER BY u.valoracion DESC'
        )->setParameters(['cantP'=>(int)$request->get('cantidadP'),'prov'=>$prov]);
        $paginator = $container->get('knp_paginator');
        $results = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 2)
        );
        return ($results);
    }


}