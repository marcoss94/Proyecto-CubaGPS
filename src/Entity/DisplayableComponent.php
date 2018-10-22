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
 * @DiscriminatorMap({"Carro" = "Carro", "Casa" = "Casa","Activity"="Activity","Excursion"="Excursion","Habitacion"="Habitacion"})
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
    private $description;

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
        $this->images =new ArrayCollection();
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

    public function getMainImage(){

        $images=$this->images;
        foreach ($images as $img){
            if($img->getMain())return $img;
        }
        return $images[0];
    }
}
