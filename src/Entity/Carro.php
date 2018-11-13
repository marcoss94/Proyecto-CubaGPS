<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarroRepository")
 */
class Carro extends DisplayableComponent
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreChofer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chapa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modelo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $licencia;


    /**
     * @ORM\Column(type="boolean")
     */
    private $climatizado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $descapotable;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidadAsientos;

    /**
     * @ORM\Column(type="array")
     */
    private $idiomas=['Español'];


    function __toString()
    {
        return (string)$this->modelo;
    }


    /**
     * @return mixed
     */
    public function getMainPhoto()
    {
        return $this->mainPhoto;
    }

    /**
     * @param mixed $mainPhoto
     */
    public function setMainPhoto($mainPhoto)
    {
        $this->mainPhoto = $mainPhoto;
    }

    /**
     * @return mixed
     */
    public function getNombreChofer()
    {
        return $this->nombreChofer;
    }

    /**
     * @param mixed $nombreChofer
     */
    public function setNombreChofer($nombreChofer)
    {
        $this->nombreChofer = $nombreChofer;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getCel()
    {
        return $this->cel;
    }

    /**
     * @param mixed $cel
     */
    public function setCel($cel)
    {
        $this->cel = $cel;
    }

    /**
     * @return mixed
     */
    public function getChapa()
    {
        return $this->chapa;
    }

    /**
     * @param mixed $chapa
     */
    public function setChapa($chapa)
    {
        $this->chapa = $chapa;
    }

    /**
     * @return mixed
     */
    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getLicencia()
    {
        return $this->licencia;
    }

    /**
     * @param mixed $licencia
     */
    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }

    /**
     * @return mixed
     */
    public function getClimatizado()
    {
        return $this->climatizado;
    }

    /**
     * @param mixed $climatizado
     */
    public function setClimatizado($climatizado)
    {
        $this->climatizado = $climatizado;
    }

    /**
     * @return mixed
     */
    public function getDescapotable()
    {
        return $this->descapotable;
    }

    /**
     * @param mixed $descapotable
     */
    public function setDescapotable($descapotable)
    {
        $this->descapotable = $descapotable;
    }

    /**
     * @return mixed
     */
    public function getCantidadAsientos()
    {
        return $this->cantidadAsientos;
    }

    /**
     * @param mixed $cantidadAsientos
     */
    public function setCantidadAsientos($cantidadAsientos)
    {
        $this->cantidadAsientos = $cantidadAsientos;
    }

    /**
     * @return mixed
     */
    public function getIdiomas()
    {
        return $this->idiomas;
    }

    /**
     * @param mixed $idiomas
     */
    public function setIdiomas($idiomas)
    {
        $this->idiomas = $idiomas;
    }

    public function getType(){
        return 'Carro';
    }



}
