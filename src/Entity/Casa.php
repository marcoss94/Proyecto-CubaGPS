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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cocina;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tipoEstablecimiento;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $parqueoGaraje;

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
    private $lavanderia;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $masaje;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $wifi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cajaFuerte;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $guia;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $terraza;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active = true;

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

    public function getCocina(): ?bool
    {
        return $this->cocina;
    }

    public function setCocina(?bool $cocina): self
    {
        $this->cocina = $cocina;

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

    public function getParqueoGaraje(): ?bool
    {
        return $this->parqueoGaraje;
    }

    public function setParqueoGaraje(?bool $parqueoGaraje): self
    {
        $this->parqueoGaraje = $parqueoGaraje;

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

    public function getLavanderia(): ?bool
    {
        return $this->lavanderia;
    }

    public function setLavanderia(?bool $lavanderia): self
    {
        $this->lavanderia = $lavanderia;

        return $this;
    }

    public function getMasaje(): ?bool
    {
        return $this->masaje;
    }

    public function setMasaje(?bool $masaje): self
    {
        $this->masaje = $masaje;

        return $this;
    }

    public function getWifi(): ?bool
    {
        return $this->wifi;
    }

    public function setWifi(?bool $wifi): self
    {
        $this->wifi = $wifi;

        return $this;
    }

    public function getCajaFuerte(): ?bool
    {
        return $this->cajaFuerte;
    }

    public function setCajaFuerte(?bool $cajaFuerte): self
    {
        $this->cajaFuerte = $cajaFuerte;

        return $this;
    }

    public function getGuia(): ?bool
    {
        return $this->guia;
    }

    public function setGuia(?bool $guia): self
    {
        $this->guia = $guia;

        return $this;
    }

    public function getTerraza(): ?bool
    {
        return $this->terraza;
    }

    public function setTerraza(?bool $terraza): self
    {
        $this->terraza = $terraza;

        return $this;
    }

    public function __toString()
    {
        return $this->getDireccion() . ' ' . $this->getMunicipio();
    }
}
