<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comentario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $revisado=false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DisplayableComponent", inversedBy="comentarios")
     */
    private $component;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Paquete", inversedBy="comentarios")
     */
    private $paquete;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $type='global';

    /**
     * @ORM\Column(type="integer")
     */
    private $valoracion=0;

    /**
     *
     * @ORM\Column(type="datetime")
     *
     */
    private $publishedAt;

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setPublishedAt()
    {
        $this->publishedAt = new \DateTime();
    }


    public function getTarget(){
        if($this->type=='component')return $this->component;
        elseif ($this->type=='paquete')return $this->paquete;
        else return 'CubaGPS';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
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
    }

    public function getAutor(): ?User
    {
        return $this->autor;
    }

    public function setAutor(?User $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getRevisado(): ?bool
    {
        return $this->revisado;
    }

    public function setRevisado(bool $revisado): self
    {
        $this->revisado = $revisado;

        return $this;
    }


    public function getComponent(): ?DisplayableComponent
    {
        return $this->component;
    }

    public function setComponent(?DisplayableComponent $component): self
    {
        $this->component = $component;

        return $this;
    }

    public function getPaquete(): ?Paquete
    {
        return $this->paquete;
    }

    public function setPaquete(?Paquete $paquete): self
    {
        $this->paquete = $paquete;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

}
