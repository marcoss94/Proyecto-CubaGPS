<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\DiaRepository")
 */
class Dia
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $orden;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Paquete", inversedBy="dias")
     * @ORM\JoinColumn(name="paquete_id", referencedColumnName="id",onDelete="cascade")
     */
    private $paquete;

    /**
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="dia")
     * @ORM\OrderBy({"orden" = "ASC"})
     */
    private $activities;

    /**
     * Dia constructor.
     * @param $activities
     */
    public function __construct()
    {
        $this->activities = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @param mixed $activities
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
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
    public function getPaquete()
    {
        return $this->paquete;
    }

    /**
     * @param mixed $paquete
     */
    public function setPaquete($paquete)
    {
        $this->paquete = $paquete;
    }

    public function getId(): ?int
    {
        return $this->id;
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


}
