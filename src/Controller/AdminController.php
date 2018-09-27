<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Album;
use App\Entity\Carro;
use App\Entity\Casa;
use App\Entity\Dia;
use App\Entity\Image;
use App\Entity\Paquete;
use App\Form\CarForm;
use App\Form\HouseForm;
use App\Form\PaqueteForm;
use App\Repository\ActivityRepository;
use App\Repository\CarroRepository;
use App\Repository\CasaRepository;
use App\Repository\DiaRepository;
use App\Repository\DisplayableComponentRepository;
use App\Repository\ImageRepository;
use App\Repository\PaqueteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Service\FileUploader;


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
     * @Route("/admin/cars", name="admin_cars")
     */
    public function cars(Request $request, CarroRepository $carroRepository)
    {
        $carros = $carroRepository->findAll();
        $carro = new Carro();
        $form = $this->createForm(CarForm::class, $carro);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $carro = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($carro);
            $em->flush();
            return $this->redirectToRoute('admin_cars');
        }
        return $this->render('admin/cars.html.twig', ['createForm' => $form->createView(), 'carros' => $carros, 'status' => 'create']);
    }


    /**
     * @Route("/admin/edit_car", name="edit_car")
     */
    public function edit_car(Request $request, CarroRepository $carroRepository)
    {
        $carros = $carroRepository->findAll();
        $carro = $carroRepository->find($request->get('id'));
        $editform = $this->createForm(CarForm::class, $carro);
        $editform->handleRequest($request);
        if ($editform->isSubmitted() && $editform->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $carro = $editform->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($carro);
            $em->flush();
            return $this->redirectToRoute('admin_cars');
        }
        $newCar = new Carro();
        $form = $this->createForm(CarForm::class, $newCar);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $newCar = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newCar);
            $em->flush();
            return $this->redirectToRoute('admin_cars');
        }

        return $this->render('admin/cars.html.twig', ['editForm' => $editform->createView(), 'createForm' => $form->createView(), 'carros' => $carros, 'status' => 'edit']);
    }


    /**
     * @Route("/admin/delete_car", name="delete_car")
     */
    public function delete_car(Request $request, CarroRepository $carroRepository)
    {
        $carro = $carroRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($carro);
        $em->flush();
        return $this->redirectToRoute('admin_cars');
    }


    /**
     * @Route("/admin/houses", name="admin_houses")
     */
    public function houses(Request $request, CasaRepository $casaRepository)
    {
        $casas = $casaRepository->findAll();
        $casa = new Casa();
        $form = $this->createForm(HouseForm::class, $casa);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $casa = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($casa);
            $em->flush();
            return $this->redirectToRoute('admin_houses');
        }
        return $this->render('admin/houses.html.twig', ['createForm' => $form->createView(), 'casas' => $casas, 'status' => 'create']);
    }

    /**
     * @Route("/admin/edit_house", name="edit_house")
     */
    public function edit_house(Request $request, CasaRepository $casaRepository)
    {
        $casas = $casaRepository->findAll();
        $casa = $casaRepository->find($request->get('id'));
        $editform = $this->createForm(HouseForm::class, $casa);
        $editform->handleRequest($request);
        if ($editform->isSubmitted() && $editform->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $casa = $editform->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($casa);
            $em->flush();
            return $this->redirectToRoute('admin_houses');
        }
        $newHosue = new Casa();
        $form = $this->createForm(HouseForm::class, $newHosue);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $newHosue = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newHosue);
            $em->flush();
            return $this->redirectToRoute('admin_houses');
        }

        return $this->render('admin/houses.html.twig', ['editForm' => $editform->createView(), 'createForm' => $form->createView(), 'casas' => $casas, 'status' => 'edit']);
    }

    /**
     * @Route("/admin/delete_house", name="delete_house")
     */
    public function delete_house(Request $request, CasaRepository $casaRepository)
    {
        $casa = $casaRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($casa);
        $em->flush();
        return $this->redirectToRoute('admin_houses');

    }

    /**
     * @Route("/admin/album", name="album")
     */
    public function album(Request $request, DisplayableComponentRepository $displayableComponentRepository, FileUploader $fileUploader)
    {
        $em = $this->getDoctrine()->getManager();
        $owner = $displayableComponentRepository->find($request->get('id'));
        $image = new Image();
        $form = $this->createFormBuilder($image)
            ->add('path', FileType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $image->getPath();
            $fileName = $fileUploader->upload($file);
            $image->setPath('uploads/images/' . $fileName);
            $image->setDisplayableComponent($owner);
            $em->persist($image);
            $em->flush();
            return $this->render('admin/album.html.twig', ['owner' => $owner, 'form' => $form->createView()]);
        }
        return $this->render('admin/album.html.twig', ['owner' => $owner, 'form' => $form->createView()]);
    }

    /**
     * @Route("/admin/delete_image", name="delete_image")
     */
    public function delete_image(Request $request, DisplayableComponentRepository $componentRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $owner = $componentRepository->find($request->get('ownerId'));
        $images = $owner->getImages();
        foreach ($images as $image) {
            if ($image->getId() == $request->get('id')) {
                $em->remove($image);
                $em->flush();
                break;
            }
        }
        return $this->redirectToRoute('album', array('id' => $owner->getId()));
    }

    /**
     * @Route("/admin/main_image", name="main_image")
     */
    public function main_image(Request $request, DisplayableComponentRepository $componentRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $owner = $componentRepository->find($request->get('ownerId'));
        $images = $owner->getImages();
        foreach ($images as $image) {
            $image->setMain(($image->getId() == $request->get('id')) ? true : false);
            $em->persist($image);
        }
        $em->flush();
        return $this->redirectToRoute('album', array('id' => $owner->getId()));
    }

    /**
     * @Route("/admin/paquetes", name="paquetes")
     */
    public function paquetes(Request $request, PaqueteRepository $paqueteRepository)
    {
        $paquetes = $paqueteRepository->findAll();
        $paquete = new Paquete();
        $form = $this->createForm(PaqueteForm::class, $paquete);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $paquete = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($paquete);
            $em->flush();
            return $this->redirectToRoute('paquetes');
        }
        return $this->render('admin/paquetes.html.twig', ['createForm' => $form->createView(), 'paquetes' => $paquetes, 'status' => 'create']);
    }

    /**
     * @Route("/admin/edit_paquete", name="edit_paquete")
     */
    public function edit_paquete(Request $request, PaqueteRepository $paqueteRepository)
    {
        $paquetes = $paqueteRepository->findAll();
        $paquete = $paqueteRepository->find($request->get('id'));
        $editform = $this->createForm(PaqueteForm::class, $paquete);
        $editform->handleRequest($request);
        if ($editform->isSubmitted() && $editform->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $paquete = $editform->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($paquete);
            $em->flush();
            return $this->redirectToRoute('paquetes');
        }
        $newPaquete = new Paquete();
        $form = $this->createForm(PaqueteForm::class, $newPaquete);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $newPaquete = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newPaquete);
            $em->flush();
            return $this->redirectToRoute('paquetes');
        }

        return $this->render('admin/paquetes.html.twig', ['editForm' => $editform->createView(), 'createForm' => $form->createView(), 'paquetes' => $paquetes, 'status' => 'edit']);
    }

    /**
     * @Route("/admin/delete_paquete", name="delete_paquete")
     */
    public function delete_paquete(Request $request, PaqueteRepository $paqueteRepository)
    {
        $paquete = $paqueteRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($paquete);
        $em->flush();
        return $this->redirectToRoute('paquetes');
    }

    /**
     * @Route("/admin/activities", name="activities")
     */
    public function activities(Request $request, CarroRepository $carroRepository, PaqueteRepository $paqueteRepository)
    {
        $carros = $carroRepository->findAll();
        $paquete = $paqueteRepository->find($request->get('id'));
        return $this->render('admin/activities.html.twig', ['paquete' => $paquete, 'excursiones' => $carros]);
    }

    /**
     * @Route("/admin/new_day", name="new_day")
     */
    public function new_day(Request $request, PaqueteRepository $paqueteRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $paquete = $paqueteRepository->find($request->get('paqueteId'));
        $dia = new Dia();
        $dia->setPaquete($paquete);
        $dia->setNombre($request->get('nombre'));
        $dia->setOrden($request->get('order'));
        $em->persist($dia);
        $em->flush();
        return $this->redirectToRoute('activities', ['id' => $paquete->getId()]);
    }

    /**
     * @Route("/admin/delete_day", name="delete_day")
     */
    public function delete_day(Request $request, DiaRepository $diaRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $dia = $diaRepository->find($request->get('diaId'));
        $em->remove($dia);
        $em->flush();
        return $this->redirectToRoute('activities', ['id' => $request->get('paqueteId')]);
    }

    /**
     * @Route("/admin/new_activity", name="new_activity")
     */
    public function new_activity(Request $request, CarroRepository $carroRepository, DiaRepository $diaRepository)
    {
        $excursionId = $request->get('excursion');
        $em = $this->getDoctrine()->getManager();
        $dia = $diaRepository->find($request->get('diaId'));
        $activity = new Activity();
        $activity->setOrden($request->get('order'));
        $activity->setHorario($request->get('horario'));
        if ($excursionId) {
            $excursion = $carroRepository->find($excursionId);
            $activity->setNombre($excursion->getNombre());
            $activity->setDescripcion($excursion->getModelo());
            $originalImages = $excursion->getImages();
            foreach ($originalImages as $originalImage) {
                $newImage = new Image();
                $newImage->setDisplayableComponent($activity);
                $newImage->setMain($originalImage->getMain());
                $newImage->setPath($originalImage->getPath());
                $em->persist($newImage);
            }
            $activity->setImages($excursion->getImages());
        } else {
            $activity->setNombre($request->get('nombre'));
            $activity->setDescripcion($request->get('description'));
        }
        $activity->setDia($dia);
        $em->persist($activity);
        $em->flush();
        return $this->redirectToRoute('activities', ['id' => $dia->getPaquete()->getId()]);
    }

    /**
     * @Route("/admin/delete_activity", name="delete_activity")
     */
    public function delete_activity(Request $request, ActivityRepository $activityRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $activity = $activityRepository->find($request->get('activityId'));
        $em->remove($activity);
        $em->flush();
        return $this->redirectToRoute('activities', ['id' => $request->get('paqueteId')]);
    }

    /**
     * @Route("/admin/uploadedImages", name="uploadedImages")
     */
    public function uploadedImages(Request $request,CarroRepository $carroRepository,CasaRepository $casaRepository,DisplayableComponentRepository $displayableComponentRepository)
    {
        $images=[];
        $owner=$displayableComponentRepository->find($request->get('ownerId'));
        if($request->get('type')=='carro'){
            $objects=$carroRepository->findAll();

        }else{
            $objects=$casaRepository->findAll();
        }
        $i=0;
        $j=0;
        foreach($objects as $object){
            foreach ($object->getImages() as $image){
                $images[$i][$j%4]=$image;
                $i=($j++==3)?++$i:$i;
            }
        }
       return $this->render('admin/uploadedAlbum.html.twig',['images'=>$images,'owner'=>$owner]);
    }

    /**
     * @Route("/admin/saveUploads", name="saveUploads")
     */
    public function saveUploads(Request $request,ImageRepository $imageRepository, DisplayableComponentRepository $displayableComponentRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $images=explode(',',$request->get('images'));
        $owner=$displayableComponentRepository->find($request->get('ownerId'));
        foreach ($images as $image){
            $originalImage=$imageRepository->find($image);
            $newImage=new Image();
            $newImage->setDisplayableComponent($owner);
            $newImage->setPath($originalImage->getPath());
            $em->persist($newImage);
        }
        $em->flush();
        return $this->redirectToRoute('album', ['id' => $owner->getId()]);
    }





}
