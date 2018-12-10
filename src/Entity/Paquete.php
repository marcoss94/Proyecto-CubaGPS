<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaqueteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Paquete extends DisplayableComponent
{


    /**
     * @ORM\Column(type="integer", length=20)
     */
    private $nochesDuracion;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio1;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio2;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio3;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $incluye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $included;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noIncluye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $notIncluded;


    /**
     * @return mixed
     */
    public function getIncluded()
    {
        return $this->included;
    }

    /**
     * @param mixed $included
     */
    public function setIncluded($included)
    {
        $this->included = $included;
    }

    /**
     * @return mixed
     */
    public function getNotIncluded()
    {
        return $this->notIncluded;
    }

    /**
     * @param mixed $notIncluded
     */
    public function setNotIncluded($notIncluded)
    {
        $this->notIncluded = $notIncluded;
    }

    /**
     * @return mixed
     */
    public function getIncluye()
    {
        return $this->incluye;
    }

    /**
     * @return mixed
     */
    public function getPrecio4()
    {
        return $this->precio4;
    }

    /**
     * @param mixed $precio4
     */
    public function setPrecio4($precio4)
    {
        $this->precio4 = $precio4;
    }

    /**
     * @param mixed $incluye
     */
    public function setIncluye($incluye)
    {
        $this->incluye = $incluye;
    }

    /**
     * @return mixed
     */
    public function getPrecio1()
    {
        return $this->precio1;
    }

    /**
     * @param mixed $precio1
     */
    public function setPrecio1($precio1)
    {
        $this->precio1 = $precio1;
    }

    /**
     * @return mixed
     */
    public function getPrecio2()
    {
        return $this->precio2;
    }

    /**
     * @param mixed $precio2
     */
    public function setPrecio2($precio2)
    {
        $this->precio2 = $precio2;
    }

    /**
     * @return mixed
     */
    public function getPrecio3()
    {
        return $this->precio3;
    }

    /**
     * @param mixed $precio3
     */
    public function setPrecio3($precio3)
    {
        $this->precio3 = $precio3;
    }

    /**
     * @return mixed
     */
    public function getNoIncluye()
    {
        return $this->noIncluye;
    }

    /**
     * @param mixed $noIncluye
     */
    public function setNoIncluye($noIncluye)
    {
        $this->noIncluye = $noIncluye;
    }

    /**
     * @return mixed
     */
    public function getNochesDuracion()
    {
        return $this->nochesDuracion;
    }

    /**
     * @param mixed $nochesDuracion
     */
    public function setNochesDuracion($nochesDuracion)
    {
        $this->nochesDuracion = $nochesDuracion;
    }




    public function getType(){
        return 'Paquete';
    }



}
