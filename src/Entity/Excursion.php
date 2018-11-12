<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExcursionRepository")
 */
class Excursion extends DisplayableComponent
{

    /**
     * @ORM\Column(type="array")
     */
    private $diasDisponibles=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $horaInicio;

    /**
     * @ORM\Column(type="boolean")
     */
    private $guia;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tiempoDuracion;

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
     * @ORM\Column(type="boolean")
     */
    private $desayuno=false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $almuerzo=false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $comida=false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reglamento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reglament;

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
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitud;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitud;



    public function getDiasDisponibles(): ?array
    {
        return $this->diasDisponibles;
    }

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
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @return mixed
     */
    public function getReglament()
    {
        return $this->reglament;
    }

    /**
     * @param mixed $reglament
     */
    public function setReglament($reglament)
    {
        $this->reglament = $reglament;
    }

    /**
     * @return mixed
     */
    public function getTiempoDuracion()
    {
        return $this->tiempoDuracion;
    }

    /**
     * @param mixed $tiempoDuracion
     */
    public function setTiempoDuracion($tiempoDuracion)
    {
        $this->tiempoDuracion = $tiempoDuracion;
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

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setDiasDisponibles(array $diasDisponibles): self
    {
        $this->diasDisponibles = $diasDisponibles;

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

    function __toString()
    {
        return (string)parent::getNombre();
    }

    public function getType(){
        return 'Excursion';
    }


}
