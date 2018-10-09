<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="DisplayableComponent", inversedBy="images")
     * @ORM\JoinColumn(name="component_id", referencedColumnName="id")
     */
    private $displayableComponent;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $altName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $main = false;

    /**
     * @return mixed
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * @param mixed $main
     */
    public function setMain($main)
    {
        $this->main = $main;
    }

    /**
     * @return mixed
     */
    public function getDisplayableComponent()
    {
        return $this->displayableComponent;
    }

    /**
     * @param mixed $displayableComponent
     */
    public function setDisplayableComponent($displayableComponent)
    {
        $this->displayableComponent = $displayableComponent;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $full;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $min;

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param mixed $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * @return mixed
     */
    public function getHalf()
    {
        return $this->half;
    }

    /**
     * @param mixed $half
     */
    public function setHalf($half)
    {
        $this->half = $half;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $half;

    /**
     * @return mixed
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * @param mixed $full
     */
    public function setFull($full)
    {
        $this->full = $full;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAltName()
    {
        return $this->altName;
    }

    /**
     * @param mixed $altName
     */
    public function setAltName(DisplayableComponent $owner)
    {
        if($owner instanceof Carro){
            $this->altName='autos clásicos';
        }elseif ($owner instanceof Casa){
            $this->altName='renta Cuba';
        }else{
            $this->altName='cubaGPS';
        }
    }


    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->full;
        if ($file) {
            unlink($file);
        }
        $file = $this->half;
        if ($file) {
            unlink($file);
        }
        $file = $this->min;
        if ($file) {
            unlink($file);
        }
    }
}
