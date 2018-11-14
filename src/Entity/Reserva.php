<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservaRepository")
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
    private $habitaciones=[];


    /**
     *
     *
     * @ORM\Column(type="string",length=10)
     */
    private $status = 'pre';

    /**
     * @ORM\Column(type="integer")
     */
    private $costo;

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
    private $children=0;

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


}
