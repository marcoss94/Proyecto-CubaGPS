<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $licencia;


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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tipoEstablecimiento;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active = true;

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $servicios;

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $composicion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Habitacion", mappedBy="casa", orphanRemoval=true, cascade={"remove"})
     */
    private $habitaciones;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitud;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitud;



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
     * @return mixed
     */
    public function getComposicion()
    {
        return $this->composicion;
    }

    /**
     * @param mixed $composicion
     */
    public function setComposicion($composicion)
    {
        $this->composicion = $composicion;
    }

    public function getPrecio()
    {
        $c = 0;
        $rooms = $this->getHabitaciones();
        foreach ($rooms as $room) {
            $c += $room->getPrecio();
        }
        return $c;
    }

    /**
     * @return mixed
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param mixed $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }


    public function __construct()
    {
        parent::__construct();
        $this->habitaciones = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return ($this->active && count($this->habitaciones));
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
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
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

    public function getTipoEstablecimiento(): ?string
    {
        return $this->tipoEstablecimiento;
    }

    public function setTipoEstablecimiento(?string $tipoEstablecimiento): self
    {
        $this->tipoEstablecimiento = $tipoEstablecimiento;
        return $this;
    }

    function __toString()
    {
        return (string)parent::getNombre();
    }

    /**
     * @return Collection|Habitacion[]
     */
    public function getHabitaciones(): Collection
    {
        return $this->habitaciones;
    }

    public function addHabitacione(Habitacion $habitacione): self
    {
        if (!$this->habitaciones->contains($habitacione)) {
            $this->habitaciones[] = $habitacione;
            $habitacione->setCasa($this);
        }

        return $this;
    }

    public function removeHabitacione(Habitacion $habitacione): self
    {
        if ($this->habitaciones->contains($habitacione)) {
            $this->habitaciones->removeElement($habitacione);
            // set the owning side to null (unless already changed)
            if ($habitacione->getCasa() === $this) {
                $habitacione->setCasa(null);
            }
        }

        return $this;
    }

    public function getType(){
        return 'Casa';
    }

}
