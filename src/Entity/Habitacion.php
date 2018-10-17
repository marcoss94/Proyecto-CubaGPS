<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HabitacionRepository")
 */
class Habitacion extends DisplayableComponent
{
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $camasDobles;

    /**
     * @ORM\Column(type="integer")
     */
    private $camasSimples;

    /**
     * @ORM\Column(type="integer")
     */
    private $literas;

    /**
     * @ORM\Column(type="integer")
     */
    private $piso;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $vista;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $servicios;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Casa", inversedBy="habitaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $casa;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $privada;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $independiente;

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * @return mixed
     */
    public function getPrivada()
    {
        return $this->privada;
    }

    /**
     * @param mixed $privada
     */
    public function setPrivada($privada)
    {
        $this->privada = $privada;
    }

    /**
     * @return mixed
     */
    public function getIndependiente()
    {
        return $this->independiente;
    }

    /**
     * @param mixed $independiente
     */
    public function setIndependiente($independiente)
    {
        $this->independiente = $independiente;
    }

    /**
     * @param mixed $piso
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;
    }

    /**
     * @return mixed
     */
    public function getVista()
    {
        return $this->vista;
    }

    /**
     * @param mixed $vista
     */
    public function setVista($vista)
    {
        $this->vista = $vista;
    }

    /**
     * @return mixed
     */
    public function getLiteras()
    {
        return $this->literas;
    }

    /**
     * @param mixed $literas
     */
    public function setLiteras($literas)
    {
        $this->literas = $literas;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }


    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCamasDobles(): ?int
    {
        return $this->camasDobles;
    }

    public function setCamasDobles(int $camasDobles): self
    {
        $this->camasDobles = $camasDobles;

        return $this;
    }

    public function getCamasSimples(): ?int
    {
        return $this->camasSimples;
    }

    public function setCamasSimples(int $camasSimples): self
    {
        $this->camasSimples = $camasSimples;

        return $this;
    }

    public function getServicios(): ?array
    {
        return $this->servicios;
    }

    public function setServicios(?array $servicios): self
    {
        $this->servicios = $servicios;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCasa(): ?Casa
    {
        return $this->casa;
    }

    public function setCasa(?Casa $casa): self
    {
        $this->casa = $casa;

        return $this;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
