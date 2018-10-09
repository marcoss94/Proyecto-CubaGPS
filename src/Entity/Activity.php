<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity extends DisplayableComponent
{


    /**
     * @ORM\ManyToOne(targetEntity="Dia", inversedBy="activity")
     * @ORM\JoinColumn(name="day_id", referencedColumnName="id",onDelete="cascade")
     */
    private $dia;

    /**
     * @ORM\Column(type="integer")
     */
    public $orden;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horario;

    /**
     * @return mixed
     */
    public function getHorario()
    {
        return $this->horario;
    }


    /**
     * @param mixed $horario
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    /**
     * @return mixed
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * @param mixed $orden
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    }

    /**
     * @return mixed
     */
    public function getNombre(): ?string
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
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * @param mixed $dia
     */
    public function setDia($dia)
    {
        $this->dia = $dia;
    }

    public function __toString()
    {
        return $this->getNombre();
    }



}
