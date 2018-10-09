<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Carro;
use App\Entity\Casa;
use App\Entity\Dia;
use App\Entity\Excursion;
use App\Entity\Image;
use App\Entity\Paquete;
use App\Form\CarForm;
use App\Form\ExcursionForm;
use App\Form\HouseForm;
use App\Form\PaqueteForm;
use App\Repository\ActivityRepository;
use App\Repository\CarroRepository;
use App\Repository\CasaRepository;
use App\Repository\DiaRepository;
use App\Repository\DisplayableComponentRepository;
use App\Repository\ExcursionRepository;
use App\Repository\ImageRepository;
use App\Repository\PaqueteRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
        $paquete = '';
        if ($owner instanceof Carro) {
            $type = 'admin_cars';
            $label = 'Carros';
        } elseif ($owner instanceof Casa) {
            $type = 'admin_houses';
            $label = 'Casas';
        } elseif ($owner instanceof Excursion) {
            $type = 'excursiones';
            $label = 'Excursiones';
        } else {
            $type = 'actividad';
            $paquete = $owner->getDia()->getPaquete();
            $label = '';
        }
        $image = new Image();
        $form = $this->createFormBuilder($image)
            ->add('full', FileType::class, array('label' => 'Imagen'))
            ->add('save', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $image->getFull();
            $fileName = $fileUploader->upload($file);
            $image->setFull('uploads/images/' . $fileName);
            $image->setDisplayableComponent($owner);
            $this->createThumb($image->getFull(), $fileName);
            $imageThumb = $this->resize_image($image->getFull(), 100, 100, false);
            $imageLow = $this->resize_image($image->getFull(), 350, 350, false);
            $image->setMin('uploads/thumb/' . $fileName);
            $image->setHalf('uploads/low/' . $fileName);
            $image->setAltName($owner);
            $exploding = explode(".", $image->getFull());
            $ext = end($exploding);
            switch ($ext) {
                case "png":
                    imagepng($imageThumb, 'uploads/thumb/' . $fileName);
                    imagepng($imageLow, 'uploads/low/' . $fileName);
                    break;
                case "jpeg":
                    imagejpeg($imageThumb, 'uploads/thumb/' . $fileName);
                    imagejpeg($imageLow, 'uploads/low/' . $fileName);
                    break;
                case "jpg":
                    imagejpg($imageThumb, 'uploads/thumb/' . $fileName);
                    imagejpg($imageLow, 'uploads/low/' . $fileName);
                    break;
                default:
                    imagejpeg($imageThumb, 'uploads/thumb/' . $fileName);
                    imagejpeg($imageLow, 'uploads/low/' . $fileName);
                    break;
            }
            $em->persist($image);
            $em->flush();

            return $this->render('admin/album.html.twig',
                ['owner' => $owner, 'form' => $form->createView(), 'paquete' => $paquete, 'type' => $type, 'label' => $label]);
        }

        return $this->render('admin/album.html.twig',
            ['owner' => $owner, 'form' => $form->createView(), 'paquete' => $paquete, 'type' => $type, 'label' => $label]);
    }

    function createThumb($filePath, $fileName)
    {
        $imageThumb = $this->resize_image($filePath, 50, 50, false);
        $imageLow = $this->resize_image($filePath, 300, 300, false);
        $exploding = explode(".", $filePath);
        $ext = end($exploding);
        switch ($ext) {
            case "png":
                imagepng($imageThumb, 'uploads/thumb/' . $fileName);
                imagepng($imageLow, 'uploads/low/' . $fileName);
                break;
            case "jpeg":
                imagejpeg($imageThumb, 'uploads/thumb/' . $fileName);
                imagejpeg($imageLow, 'uploads/low/' . $fileName);
                break;
            case "jpg":
                imagejpg($imageThumb, 'uploads/thumb/' . $fileName);
                imagejpg($imageLow, 'uploads/low/' . $fileName);
                break;
            default:
                imagejpeg($imageThumb, 'uploads/thumb/' . $fileName);
                imagejpeg($imageLow, 'uploads/low/' . $fileName);
                break;
        }
    }

    function resize_image($file, $w, $h, $crop = false)
    {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        //Get file extension
        $exploding = explode(".", $file);
        $ext = end($exploding);

        switch ($ext) {
            case "png":
                $src = imagecreatefrompng($file);
                break;
            case "jpeg":
            case "jpg":
                $src = imagecreatefromjpeg($file);
                break;
            case "gif":
                $src = imagecreatefromgif($file);
                break;
            default:
                $src = imagecreatefromjpeg($file);
                break;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return $dst;
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
    public function activities(Request $request, ExcursionRepository $excursionRepository, PaqueteRepository $paqueteRepository)
    {
        $day = new Dia();
        $paquete = $paqueteRepository->find($request->get('id'));
        $form = $this->createFormBuilder($day)
            ->add('orden', null, array('label' => 'Orden'))
            ->add('nombre', TextType::class, array('label' => 'Nombre'))
            ->add('save', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $day = $form->getData();
            $day->setPaquete($paquete);
            $em = $this->getDoctrine()->getManager();
            $em->persist($day);
            $em->flush();
            return $this->redirectToRoute('activities', ['id' => $request->get('id')]);
        }
        $excursions = $excursionRepository->findAll();
        return $this->render('admin/activities.html.twig', ['dayForm' => $form->createView(), 'paquete' => $paquete, 'excursiones' => $excursions, 'status' => 'create']);
    }

    /**
     * @Route("/admin/edit_day", name="edit_day")
     */
    public function edit_day(Request $request, DiaRepository $diaRepository, CarroRepository $carroRepository)
    {
        $dia = $diaRepository->find($request->get('diaId'));
        $paquete = $dia->getPaquete();
        $editDayform = $this->createFormBuilder($dia)
            ->add('orden', null, array('label' => 'Orden'))
            ->add('nombre', TextType::class, array('label' => 'Nombre'))
            ->add('save', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $editDayform->handleRequest($request);
        if ($editDayform->isSubmitted() && $editDayform->isValid()) {
            $dia = $editDayform->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($dia);
            $em->flush();
            return $this->redirectToRoute('activities', ['id' => $paquete->getId()]);
        }
        $newDay = new Dia();
        $form = $this->createFormBuilder($newDay)
            ->add('orden', null, array('label' => 'Orden'))
            ->add('nombre', TextType::class, array('label' => 'Nombre'))
            ->add('save', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $form->handleRequest($request);
        if ($editDayform->isSubmitted() && $editDayform->isValid()) {
            $newDay = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newDay);
            $em->flush();
            return $this->redirectToRoute('activities', ['id' => $paquete->getId()]);
        }
        $carros = $carroRepository->findAll();
        return $this->render('admin/activities.html.twig',
            ['dayForm' => $form->createView(), 'editDayForm' => $editDayform->createView(), 'paquete' => $paquete, 'excursiones' => $carros, 'status' => 'edit']);
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
    public function new_activity(Request $request, ExcursionRepository $excursionRepository, DiaRepository $diaRepository)
    {
        $excursionId = $request->get('excursion');
        $em = $this->getDoctrine()->getManager();
        $dia = $diaRepository->find($request->get('diaId'));
        $activity = new Activity();
        $activity->setOrden($request->get('order'));
        $activity->setHorario($request->get('horario'));
        if ($excursionId) {
            $excursion = $excursionRepository->find($excursionId);
            $activity->setNombre($excursion->getNombre());
            $activity->setDescripcion($excursion->getDescripcion());
            $originalImages = $excursion->getImages();
            foreach ($originalImages as $originalImage) {
                $newImage = new Image();
                $newImage->setDisplayableComponent($activity);
                $newImage->setMain($originalImage->getMain());
                $newImage->setFull($originalImage->getFull());
                $newImage->setHalf($originalImage->getHalf());
                $newImage->setMin($originalImage->getMin());
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
     * @Route("/admin/edit_activity", name="edit_activity")
     */
    public function edit_activity(Request $request, ActivityRepository $activityRepository)
    {
        $activity = $activityRepository->find($request->get('id'));
        $activity->setNombre($request->get('nombre'));
        $activity->setDescripcion($request->get('descripcion'));
        $activity->setHorario($request->get('horario'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($activity);
        $em->flush();
        return $this->redirectToRoute('activities', ['id' => $activity->getDia()->getPaquete()->getId()]);
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
    public function uploadedImages(Request $request, CarroRepository $carroRepository, CasaRepository $casaRepository, DisplayableComponentRepository $displayableComponentRepository)
    {
        $images = [];
        $owner = $displayableComponentRepository->find($request->get('ownerId'));
        if ($request->get('type') == 'carro') {
            $objects = $carroRepository->findAll();

        } else {
            $objects = $casaRepository->findAll();
        }
        $i = 0;
        $j = 0;
        foreach ($objects as $object) {
            foreach ($object->getImages() as $image) {
                $images[$i][$j % 4] = $image;
                $i = ($j++ == 3) ? ++$i : $i;
            }
        }
        return $this->render('admin/uploadedAlbum.html.twig', ['images' => $images, 'owner' => $owner]);
    }

    /**
     * @Route("/admin/saveUploads", name="saveUploads")
     */
    public function saveUploads(Request $request, ImageRepository $imageRepository, DisplayableComponentRepository $displayableComponentRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $images = explode(',', $request->get('images'));
        $owner = $displayableComponentRepository->find($request->get('ownerId'));
        foreach ($images as $image) {
            $originalImage = $imageRepository->find($image);
            $newImage = new Image();
            $newImage->setDisplayableComponent($owner);
            $newImage->setFull($originalImage->getFull());
            $newImage->setHalf($originalImage->getHalf());
            $newImage->setMin($originalImage->getMin());
            $newImage->setAltName($owner);
            $em->persist($newImage);
        }
        $em->flush();
        return $this->redirectToRoute('album', ['id' => $owner->getId()]);
    }

    /**
     * @Route("/admin/excursiones", name="excursiones")
     */
    public function excursiones(Request $request, ExcursionRepository $excursionRepository)
    {
        $excursiones = $excursionRepository->findAll();
        $status = $request->get('status');
        $exc = $status == 'create' ? new Excursion() : $excursionRepository->find($request->get('id'));
        $form = $this->createForm(ExcursionForm::class, $exc);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $exc = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($exc);
            $em->flush();
            return $this->redirectToRoute('excursiones', ['status' => 'create']);
        }
        return $this->render('admin/excursiones.html.twig', ['form' => $form->createView(), 'excursiones' => $excursiones, 'status' => $status]);
    }
}
