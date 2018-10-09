<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CasaRepository")
 */
class Casa extends DisplayableComponent
{

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $manager;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $direccion;

    /**
     * @ORM\Column(type="integer")
     */
    private $valoracion = 0;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $municipio;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $provincia;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $cel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;


    /**
     * @ORM\Column(type="integer")
     */
    private $cantidadHabitaciones;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $precioHabitacion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cantidadCamaDoble;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cantidadCamaSimple;


    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tipoEstablecimiento;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $desayuno;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $almuerzo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cena;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active = true;

    /**
     * @return mixed
     */
    public function getServicios()
    {
        return $this->servicios;
    }

    /**
     * @param mixed $servicios
     */
    public function setServicios($servicios)
    {
        $this->servicios = $servicios;
    }

    /**
     * @ORM\Column(type="array")
     */
    private $servicios;

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
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }


    public function getManager(): ?string
    {
        return $this->manager;
    }

    public function setManager(string $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getCel(): ?string
    {
        return $this->cel;
    }

    public function setCel(?string $cel): self
    {
        $this->cel = $cel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCantidadHabitaciones(): ?int
    {
        return $this->cantidadHabitaciones;
    }

    public function setCantidadHabitaciones(int $cantidadHabitaciones): self
    {
        $this->cantidadHabitaciones = $cantidadHabitaciones;

        return $this;
    }

    public function getPrecioHabitacion(): ?int
    {
        return $this->precioHabitacion;
    }

    public function setPrecioHabitacion(?int $precioHabitacion): self
    {
        $this->precioHabitacion = $precioHabitacion;

        return $this;
    }

    public function getCantidadCamaDoble(): ?int
    {
        return $this->cantidadCamaDoble;
    }

    public function setCantidadCamaDoble(?int $cantidadCamaDoble): self
    {
        $this->cantidadCamaDoble = $cantidadCamaDoble;

        return $this;
    }

    public function getCantidadCamaSimple(): ?int
    {
        return $this->cantidadCamaSimple;
    }

    public function setCantidadCamaSimple(?int $cantidadCamaSimple): self
    {
        $this->cantidadCamaSimple = $cantidadCamaSimple;

        return $this;
    }


    public function getTipoEstablecimiento(): ?string
    {
        return $this->tipoEstablecimiento;
    }

    public function setTipoEstablecimiento(?string $tipoEstablecimiento): self
    {
        $this->tipoEstablecimiento = $tipoEstablecimiento;

        return $this;
    }


    public function getDesayuno(): ?bool
    {
        return $this->desayuno;
    }

    public function setDesayuno(?bool $desayuno): self
    {
        $this->desayuno = $desayuno;

        return $this;
    }

    public function getAlmuerzo(): ?bool
    {
        return $this->almuerzo;
    }

    public function setAlmuerzo(?bool $almuerzo): self
    {
        $this->almuerzo = $almuerzo;

        return $this;
    }

    public function getCena(): ?bool
    {
        return $this->cena;
    }

    public function setCena(?bool $cena): self
    {
        $this->cena = $cena;

        return $this;
    }


    public function __toString()
    {
        return $this->getDireccion() . ' ' . $this->getMunicipio();
    }
}
