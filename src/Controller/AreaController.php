<?php

namespace App\Controller;

use App\Entity\Area;
use App\Repository\AreaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AreaController extends Controller
{
    /**
     * @Route("/areas", name="area")
     */
    public function areas(AreaRepository $areasRepo): Response
    {

        return $this->render('area/areas.html.twig', [
            'areas' => $areasRepo->findAll()
        ]);
    }

    /**
     * @Route("/admin/create_area", name="create_area")
     */
    public function createAreas()
    {
        return $this->render('area/create_area.html.twig', [
            'controller_name' => 'AreaController',
        ]);
    }


    /**
     * @Route("/admin/ajax_check_areaname", name="ajax_check_areaname")
     */
    public function checkAreaName(Request $request, AreaRepository $areaRepo)
    {
        $response = new JsonResponse();
        $areas = $areaRepo->findAll();
        foreach ($areas as $area) {
            if ($area->getName() == $request->get('areaname')) {
                $response->setData(['result' => false]);
                return $response;
            }
        }
        $response->setData(['result' => true]);
        return $response;
    }

    /**
     * @Route("/admin/process_area", name="process_area")
     */
    public function processArea(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $areaName = $request->get('name');
        $area = new Area();
        $area->setName($areaName);
        $em->persist($area);
        $em->flush();
        return $this->redirect($this->generateUrl('area'));
    }

}
