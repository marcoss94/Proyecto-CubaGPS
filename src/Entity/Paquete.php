<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PaqueteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Paquete
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=20)
     */
    private $diasDuracion;

    /**
     * @ORM\Column(type="integer", length=20)
     */
    private $nochesDuracion;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio1;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio2;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noIncluye;

    /**
     * @ORM\OneToMany(targetEntity="Dia", mappedBy="paquete")
     * @ORM\OrderBy({"orden" = "ASC"})
     */
    private $dias;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

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
        $this->updatedAt = $this->createdAt;

    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate()
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
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

    /**
     * @return mixed
     */
    public function getPrecio1()
    {
        return $this->precio1;
    }

    /**
     * @param mixed $precio1
     */
    public function setPrecio1($precio1)
    {
        $this->precio1 = $precio1;
    }

    /**
     * @return mixed
     */
    public function getPrecio2()
    {
        return $this->precio2;
    }

    /**
     * @param mixed $precio2
     */
    public function setPrecio2($precio2)
    {
        $this->precio2 = $precio2;
    }

    /**
     * @return mixed
     */
    public function getPrecio3()
    {
        return $this->precio3;
    }

    /**
     * @param mixed $precio3
     */
    public function setPrecio3($precio3)
    {
        $this->precio3 = $precio3;
    }

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
     * @return mixed
     */
    public function getNoIncluye()
    {
        return $this->noIncluye;
    }

    /**
     * @param mixed $noIncluye
     */
    public function setNoIncluye($noIncluye)
    {
        $this->noIncluye = $noIncluye;
    }

    /**
     * @return mixed
     */
    public function getDiasDuracion()
    {
        return $this->diasDuracion;
    }

    /**
     * @param mixed $diasDuracion
     */
    public function setDiasDuracion($diasDuracion)
    {
        $this->diasDuracion = $diasDuracion;
    }

    /**
     * @return mixed
     */
    public function getNochesDuracion()
    {
        return $this->nochesDuracion;
    }

    /**
     * @param mixed $nochesDuracion
     */
    public function setNochesDuracion($nochesDuracion)
    {
        $this->nochesDuracion = $nochesDuracion;
    }

    /**
     * @return mixed
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * @param mixed $dias
     */
    public function setDias($dias)
    {
        $this->dias = $dias;
    }

    public function getImages()
    {
        $result = [];
        foreach ($this->dias as $dia){
            foreach ($dia->getActivities() as $activity)
            {
                $result[]=$activity->getMainImage();
            }
        }
        return $result;
    }


    /**
     * Paquete constructor.
     * @param $activities
     */
    public function __construct()
    {
        $this->dias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
