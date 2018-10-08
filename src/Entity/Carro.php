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
    private $nombre;

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
     * @ORM\Column(type="string", length=40)
     */
    private $provincia;


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

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @ORM\Column(type="integer")
     */
    private $valoracion=0;

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @return mixed
     */
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * @param mixed $valoracion
     */
    public function setValoracion($valoracion)
    {
        $this->valoracion = $valoracion;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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

    public function __toString()
    {
        return $this->getModelo();
    }

}
