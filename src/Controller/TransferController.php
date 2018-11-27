<?php

namespace App\Controller;

use App\Entity\Lugar;
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
    function harvestine($lat1, $long1, $lat2, $long2)
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
        return round(($dd * $km), 2);
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
        $desde = $lugarRepository->findOneBy(['nombre'=>$request->get('desde')]);
        $hasta = $lugarRepository->findOneBy(['nombre'=>$request->get('hasta')]);
        $cantidadP = (int)$request->get('cantidadP');
        $min = $this->provincias[$desde->getProvincia()]>$this->provincias[$hasta->getProvincia()]? $this->provincias[$hasta->getProvincia()] :$this->provincias[$desde->getProvincia()];
        $max = $this->provincias[$desde->getProvincia()]<=$this->provincias[$hasta->getProvincia()]? $this->provincias[$hasta->getProvincia()] :$this->provincias[$desde->getProvincia()];
        $prov=[];
        foreach ($this->provincias as $key=>$val){
            if($val >= $min && $val <= $max){
                $prov[]=$key;
            }
        }
        $data = $query->returnTransferSearchData($request,$prov);
        return $this->render('lista/index.html.twig', ['base' => 'false', 'type' => 'search', 'data' => $data]);
    }


}
