<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Reserva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DisplayableComponent", inversedBy="reservas")
     */
    private $commponent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reservas")
     */
    private $usuario;

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $habitaciones = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     *  Prereserva -- pre
     *  Confirmada -- confirmed
     *  Pagada     -- payed
     *
     * @ORM\Column(type="string",length=10)
     */
    private $status = 'pre';

    /**
     *  Solo para los carros
     *
     *  trans
     *  exc
     *  esp
     *
     *
     * @ORM\Column(type="string",length=10,nullable=true)
     */
    private $type;

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $horas;


    /**
     * @ORM\Column(type="integer")
     */
    private $costo;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * @param mixed $horas
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $cantPersonas;

    /**
     * @return array
     */
    public function getHabitaciones(): array
    {
        return $this->habitaciones;
    }

    /**
     * @param array $habitaciones
     */
    public function setHabitaciones(array $habitaciones)
    {
        $this->habitaciones = $habitaciones;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $children = 0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lugar")
     */
    private $desde;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lugar")
     */
    private $hasta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeInterface $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    /**
     * @return mixed
     */
    public function getCantPersonas()
    {
        return $this->cantPersonas;
    }

    /**
     * @param mixed $cantPersonas
     */
    public function setCantPersonas($cantPersonas)
    {
        $this->cantPersonas = $cantPersonas;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function setEndAt(?\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getCommponent(): ?DisplayableComponent
    {
        return $this->commponent;
    }

    public function setCommponent(?DisplayableComponent $commponent): self
    {
        $this->commponent = $commponent;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getDias()
    {
        return $this->startAt->diff($this->endAt)->days;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getDesde(): ?Lugar
    {
        return $this->desde;
    }

    public function setDesde(?Lugar $desde): self
    {
        $this->desde = $desde;

        return $this;
    }

    public function getHasta(): ?Lugar
    {
        return $this->hasta;
    }

    public function setHasta(?Lugar $hasta): self
    {
        $this->hasta = $hasta;

        return $this;
    }


}
