<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

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
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $incluye;

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
     * @ORM\Column(type="integer")
     */
    private $valoracion=10;

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $valoracionArray = [0 => 5, 1 => 0, 2 => 0];

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
    public function getIncluye()
    {
        return $this->incluye;
    }

    /**
     * @param mixed $incluye
     */
    public function setIncluye($incluye)
    {
        $this->incluye = $incluye;
    }

    public function getImages()
    {
        $dias = $this->getDias();
        $activities = [];
        foreach ($dias as $dia) {
            foreach ($dia->getActivities() as $activity){
                $activities[] = $activity;
            }
        }
        $images = [];
        foreach ($activities as $activity) {
            if (count($activity->getImages())) {
                $images[] = $activity->getMainImage();
            }
        }
        return $images;
    }

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
        $this->valoracionArray[0] = (integer)($valoracion / 2);
        $this->valoracionArray[1] = $valoracion % 2;
        $this->valoracionArray[2] = 5 - $this->valoracionArray[0] - $this->valoracionArray[1];
    }

    /**
     * @return mixed
     */
    public function getValoracionArray()
    {
        return $this->valoracionArray;
    }

    /**
     * @param mixed $valoracionArray
     */
    public function setValoracionArray($valoracionArray)
    {
        $this->valoracionArray = $valoracionArray;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return mixed
     */
    public function getNombre()
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
    public function getDias(): Collection
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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
