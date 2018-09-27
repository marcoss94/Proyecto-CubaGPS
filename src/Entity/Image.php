<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable
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
     * @ORM\JoinColumn(name="component_id", referencedColumnName="id",onDelete="cascade")
     */
    private $displayableComponent;

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
    public $path;


    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
}
