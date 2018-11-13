<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DisplayableComponentRepository")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"Carro" = "Carro", "Casa" = "Casa","Activity"="Activity","Excursion"="Excursion","Habitacion"="Habitacion","Paquete"="Paquete"})
 * @ORM\HasLifecycleCallbacks()
 */
abstract class DisplayableComponent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="displayableComponent",cascade={"remove"})
     * @ORM\OrderBy({"main" = "DESC"})
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $nombre;


    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50,nullable=true)
     */
    private $municipio;

    /**
     * @ORM\Column(type="string", length=50,nullable=true)
     */
    private $provincia;

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
    private $valoracion = 10;

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $valoracionArray = [0 => 5, 1 => 0, 2 => 0];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentario", mappedBy="component")
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $comentarios;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reserva", mappedBy="commponent")
     */
    private $reservas;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacidad = 100;

    /**
     * @ORM\Column(type="integer")
     */
    private $duracion = 1;

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
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @return mixed
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * @param mixed $capacidad
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
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
     * @ORM\PreUpdate()
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
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
     * DisplayableComponent constructor.
     * @param $images
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->comentarios = new ArrayCollection();
        $this->reservas = new ArrayCollection();
        $this->dias = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getImages(): Collection
    {
        return $this->images;
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
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainImage()
    {

        $images = $this->images;
        foreach ($images as $img) {
            if ($img->getMain()) return $img;
        }
        return $images[0];
    }

    /**
     * @return mixed
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(Comentario $comentario): self
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios[] = $comentario;
            $comentario->setComponent($this);
        }

        return $this;
    }

    public function removeComentario(Comentario $comentario): self
    {
        if ($this->comentarios->contains($comentario)) {
            $this->comentarios->removeElement($comentario);
            // set the owning side to null (unless already changed)
            if ($comentario->getComponent() === $this) {
                $comentario->setComponent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reserva[]
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reserva $reserva): self
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas[] = $reserva;
            $reserva->setCommponent($this);
        }

        return $this;
    }

    function __toString()
    {
        return $this->nombre;
    }

    public function removeReserva(Reserva $reserva): self
    {
        if ($this->reservas->contains($reserva)) {
            $this->reservas->removeElement($reserva);
            // set the owning side to null (unless already changed)
            if ($reserva->getCommponent() === $this) {
                $reserva->setCommponent(null);
            }
        }

        return $this;
    }
}
