<?php

namespace App\Controller;

use App\Entity\Lugar;
use App\Form\LugarType;
use App\Repository\LugarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/lugar")
 */
class LugarController extends Controller
{
    /**
     * @Route("/", name="lugar_index", methods="GET")
     */
    public function index(LugarRepository $lugarRepository): Response
    {
        return $this->render('lugar/index.html.twig', ['lugars' => $lugarRepository->findAll()]);
    }

    /**
     * @Route("/new", name="lugar_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $lugar = new Lugar();
        $form = $this->createForm(LugarType::class, $lugar);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $lugar = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($lugar);
            $em->flush();
            return $this->redirectToRoute('lugar_index');
        }

        return $this->render('lugar/new.html.twig', [
            'lugar' => $lugar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lugar_show", methods="GET")
     */
    public function show(Lugar $lugar): Response
    {
        return $this->render('lugar/show.html.twig', ['lugar' => $lugar]);
    }

    /**
     * @Route("/{id}/edit", name="lugar_edit", methods="GET|POST")
     */
    public function edit(Request $request, Lugar $lugar): Response
    {
        $form = $this->createForm(LugarType::class, $lugar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lugar_edit', ['id' => $lugar->getId()]);
        }

        return $this->render('lugar/edit.html.twig', [
            'lugar' => $lugar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lugar_delete", methods="DELETE")
     */
    public function delete(Request $request, Lugar $lugar): Response
    {
        if ($this->isCsrfTokenValid('delete' . $lugar->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lugar);
            $em->flush();
        }

        return $this->redirectToRoute('lugar_index');
    }
}
