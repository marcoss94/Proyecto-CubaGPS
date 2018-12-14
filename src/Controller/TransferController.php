<?php

namespace App\Controller;

use App\Entity\Lugar;
use App\Entity\Reserva;
use App\Repository\CarroRepository;
use App\Repository\LugarRepository;
use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TransferController extends Controller
{

    private $provincias =
        ['Pinar del Rio' => 0,
            'Artemisa' => 1,
            'La Habana' => 2,
            'Mayabeque' => 3,
            'Matanzas' => 4,
            'Villa Clara' => 5,
            'Cienfuegos' => 6,
            'Sancti Spiritus' => 7,
            'Ciego de Ávila' => 8,
            'Camaguey' => 9,
            'Las Tunas' => 10,
            'Holguín' => 11,
            'Granma' => 12,
            'Santiago de Cuba' => 13,
            'Guantánamo' => 14,
            'Isla de la Juventud' => -1,
        ];

    /**
     * @Route("/transfer", name="transfer")
     */
    public function index()
    {
        return $this->render('transfer/index.html.twig', [
            'controller_name' => 'TransferController',
        ]);
    }

    //Distancia en km a partir de latitud longitud.
    public function harvestine($lat1, $long1, $lat2, $long2)
    {
        //Distancia en kilometros en 1 grado distancia.
        //Distancia en millas nauticas en 1 grado distancia: $mn = 60.098;
        //Distancia en millas en 1 grado distancia: 69.174;
        //Solo aplicable a la tierra, es decir es una constante que cambiaria en la luna, marte... etc.
        $km = 111.302;

        //1 Grado = 0.01745329 Radianes
        $degtorad = 0.01745329;

        //1 Radian = 57.29577951 Grados
        $radtodeg = 57.29577951;
        //La formula que calcula la distancia en grados en una esfera, llamada formula de Harvestine. Para mas informacion hay que mirar en Wikipedia
        //http://es.wikipedia.org/wiki/F%C3%B3rmula_del_Haversine
        $dlong = ($long1 - $long2);
        $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) * cos($dlong * $degtorad));
        $dd = acos($dvalue) * $radtodeg;
        return round(($dd * $km), 0);
    }


    /**
     * @Route("/ajax_get_lugares", name="ajax_get_lugares")
     */
    public function ajax_get_lugares(Request $request, LugarRepository $lugarRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $lugares = $lugarRepository->findAllPlaceNames($em);
        $response = new JsonResponse();
        $response->setData(['result' => $lugares]);
        return $response;
    }

    /**
     * @Route("/transfer_search", name="transfer_search")
     */
    public function transfer_search(Request $request, LugarRepository $lugarRepository, DataService $query)
    {
        $desde = $lugarRepository->findOneBy(['nombre' => $request->get('desde')]);
        $hasta = $lugarRepository->findOneBy(['nombre' => $request->get('hasta')]);
        $cantidadP = (int)$request->get('cantidadP');
        $min = $this->provincias[$desde->getProvincia()] > $this->provincias[$hasta->getProvincia()] ? $this->provincias[$hasta->getProvincia()] : $this->provincias[$desde->getProvincia()];
        $max = $this->provincias[$desde->getProvincia()] <= $this->provincias[$hasta->getProvincia()] ? $this->provincias[$hasta->getProvincia()] : $this->provincias[$desde->getProvincia()];
        $prov = [];
        foreach ($this->provincias as $key => $val) {
            if ($val >= $min && $val <= $max) {
                $prov[] = $key;
            }
        }
        $data = $query->returnTransferSearchData($request, $prov);
        return $this->render('lista/index.html.twig', ['base' => 'false', 'type' => 'search', 'data' => $data]);
    }

    /**
     * @Route("/ajax_get_possible_destinations", name="ajax_get_possible_destinations")
     */
    public function ajax_get_possible_destinations(Request $request, LugarRepository $lugarRepository, CarroRepository $carroRepository)
    {
        $carro = $carroRepository->find($request->get('carId'));
        $lugar = $lugarRepository->findOneBy(['nombre' => $request->get('desde')]);
        $index1 = $this->provincias[$carro->getProvincia()];
        $index2 = $this->provincias[$lugar->getProvincia()];
        $min = $index1 > $index2 ? $index2 : $index1;
        $max = $index1 <= $index2 ? $index2 : $index1;
        $prov = [];
        foreach ($this->provincias as $key => $val) {
            if ($val >= $min && $val <= $max) {
                $prov[] = $key;
            }
        }
        $places = [];
        foreach ($prov as $p) {
            $places = array_merge($places, $lugarRepository->findBy(['provincia' => $p]));
        }
        $response = new JsonResponse();
        $placeNames = [];
        foreach ($places as $place) {
            if ($place->getNombre()==$lugar->getNombre())continue;
            $placeNames[] = $place->getNombre();
        }

        $response->setData(['result' => $placeNames]);
        return $response;
    }

    /**
     * @Route("/ajax_calculate_price", name="ajax_calculate_price")
     */
    public function ajax_calculate_price(Request $request, LugarRepository $lugarRepository, CarroRepository $carroRepository)
    {
        if($request->get('type')) {
            $desde = $lugarRepository->findOneBy(['nombre' => $request->get('desde')]);
            $hasta = $lugarRepository->findOneBy(['nombre' => $request->get('hasta')]);
            $distancia = $this->harvestine($desde->getLatitud(), $desde->getLongitud(), $hasta->getLatitud(), $hasta->getLongitud());
            $precio = $distancia * (int)$request->get('precio');
        }else{
            $precio = 'precioExc';
        }
        $response = new JsonResponse();
        $response->setData(['result' => $precio]);
        return $response;
    }

    /**
     * @Route("/reserve/reserve_car_trans", name="reserve_car_trans")
     */
    public function reserve_car_trans(Request $request, CarroRepository $carroRepository,LugarRepository $lugarRepository)
    {
        $car= $carroRepository->find($request->get('id'));
        $reserve=new Reserva();
        $reserve->setCreatedAt();
        $user=$this->getUser();
        $this->changeEmailTo($request->get('email'),$user);
        $reserve->setUsuario($user);
        $reserve->setCantPersonas($request->get('cantP'));
        $reserve->setCommponent($car);
        $desde=$lugarRepository->findOneBy(['nombre'=>$request->get('desde')]);
        $hasta=$lugarRepository->findOneBy(['nombre'=>$request->get('hasta')]);
        $reserve->setDesde($desde);
        $reserve->setHasta($hasta);
        $distancia = $this->harvestine($desde->getLatitud(), $desde->getLongitud(), $hasta->getLatitud(), $hasta->getLongitud());
        $precio = $distancia * (int)$car->getPrecio();
        $reserve->setCosto($precio);
        $reserve->setStartAt(new \DateTime($request->get('fecha')));
        $reserve->setType('trans');
        $em=$this->getDoctrine()->getManager();
        $em->persist($reserve);
        $em->flush();
        $message['type'] = 'success';
        $message['head'] = ($user->getIdioma()=='es')?
            'Gracias':'Thanks';
        $message['body'] = ($user->getIdioma()=='es')?
            'Su solicitud de reserva será evaluada en breve, en menos de 24 horas le daremos respuesta'
            :'Your reservation request will be evaluated shortly, in less than 24 hours we will give you an answer';
        return $this->redirectToRoute('blog_index',['message'=>$message]);
    }

    public function changeEmailTo($email, $user)
    {
        $em = $this->getDoctrine()->getManager();
        $user->setEmail($email);
        $em->persist($user);
        $em->flush();
    }




}
