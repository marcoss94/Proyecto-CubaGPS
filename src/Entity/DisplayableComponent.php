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
 * @DiscriminatorMap({"Carro" = "Carro", "Casa" = "Casa","Activity"="Activity"})
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
