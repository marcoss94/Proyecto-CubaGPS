<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExcursionRepository")
 */
class Excursion extends DisplayableComponent
{
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $provincia;

    /**
     * @ORM\Column(type="array")
     */
    private $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $horaInicio;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $duracion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $guia;

    /**
     * @ORM\Column(type="boolean")
     */
    private $incluyeTransporte;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tipoTransporte;

    /**
     * @ORM\Column(type="integer")
     */
    private $desayuno;

    /**
     * @ORM\Column(type="integer")
     */
    private $almuerzo;

    /**
     * @ORM\Column(type="integer")
     */
    private $comida;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reglamento;

    /**
     * @ORM\Column(type="float")
     */
    private $precio1;

    /**
     * @ORM\Column(type="float")
     */
    private $precio2;

    /**
     * @ORM\Column(type="float")
     */
    private $precio3;

    /**
     * @ORM\Column(type="float")
     */
    private $precio4;

    /**
     * @ORM\Column(type="integer")
     */
    private $valoracion;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $costoAdicional;


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

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getDias(): ?array
    {
        return $this->dias;
    }

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

    public function setDias(array $dias): self
    {
        $this->dias = $dias;

        return $this;
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

    public function getHoraInicio(): ?string
    {
        return $this->horaInicio;
    }

    public function setHoraInicio(string $horaInicio): self
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    public function getDuracion(): ?string
    {
        return $this->duracion;
    }

    public function setDuracion(string $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getGuia(): ?bool
    {
        return $this->guia;
    }

    public function setGuia(bool $guia): self
    {
        $this->guia = $guia;

        return $this;
    }

    public function getIncluyeTransporte(): ?bool
    {
        return $this->incluyeTransporte;
    }

    public function setIncluyeTransporte(bool $incluyeTransporte): self
    {
        $this->incluyeTransporte = $incluyeTransporte;

        return $this;
    }

    public function getTipoTransporte(): ?string
    {
        return $this->tipoTransporte;
    }

    public function setTipoTransporte(?string $tipoTransporte): self
    {
        $this->tipoTransporte = $tipoTransporte;

        return $this;
    }

    public function getDesayuno(): ?int
    {
        return $this->desayuno;
    }

    public function setDesayuno(int $desayuno): self
    {
        $this->desayuno = $desayuno;

        return $this;
    }

    public function getAlmuerzo(): ?int
    {
        return $this->almuerzo;
    }

    public function setAlmuerzo(int $almuerzo): self
    {
        $this->almuerzo = $almuerzo;

        return $this;
    }

    public function getComida(): ?int
    {
        return $this->comida;
    }

    public function setComida(int $comida): self
    {
        $this->comida = $comida;

        return $this;
    }

    public function getReglamento(): ?string
    {
        return $this->reglamento;
    }

    public function setReglamento(?string $reglamento): self
    {
        $this->reglamento = $reglamento;

        return $this;
    }

    public function getPrecio1(): ?float
    {
        return $this->precio1;
    }

    public function setPrecio1(float $precio1): self
    {
        $this->precio1 = $precio1;

        return $this;
    }

    public function getPrecio2(): ?float
    {
        return $this->precio2;
    }

    public function setPrecio2(float $precio2): self
    {
        $this->precio2 = $precio2;

        return $this;
    }

    public function getPrecio3(): ?float
    {
        return $this->precio3;
    }

    public function setPrecio3(float $precio3): self
    {
        $this->precio3 = $precio3;

        return $this;
    }

    public function getCostoAdicional(): ?float
    {
        return $this->costoAdicional;
    }

    public function setCostoAdicional(?float $costoAdicional): self
    {
        $this->costoAdicional = $costoAdicional;

        return $this;
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

    public function __toString()
    {
        return $this->getNombre();
    }
}
