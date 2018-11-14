<?php

namespace App\Entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HabitacionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Habitacion extends DisplayableComponent
{

    /**
     * @ORM\Column(type="integer")
     */
    private $camasDobles;

    /**
     * @ORM\Column(type="integer")
     */
    private $camasSimples;

    /**
     * @ORM\Column(type="integer")
     */
    private $literas;

    /**
     * @ORM\Column(type="integer")
     */
    private $piso;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $vista;

    /**
     * @var array
     *
     * @ORM\Column(type="json", nullable=true)
     */
    private $servicios;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Casa", inversedBy="habitaciones")
     * @ORM\JoinColumn(nullable=false,onDelete="cascade")
     */
    private $casa;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $escaleras;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $privada;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $independiente;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $comun;


    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * @return mixed
     */
    public function getComun()
    {
        return $this->comun;
    }

    /**
     * @param mixed $comun
     */
    public function setComun($comun)
    {
        $this->comun = $comun;
    }

    /**
     * @return mixed
     */
    public function getPrivada()
    {
        return $this->privada;
    }

    /**
     * @return mixed
     */
    public function getEscaleras()
    {
        return $this->escaleras;
    }

    /**
     * @param mixed $escaleras
     */
    public function setEscaleras($escaleras)
    {
        $this->escaleras = $escaleras;
    }

    public function getCapacidad()
    {
        return $this->camasDobles * 2 + $this->camasSimples + $this->literas * 2;
    }

    /**
     * @param mixed $privada
     */
    public function setPrivada($privada)
    {
        $this->privada = $privada;
    }

    /**
     * @return mixed
     */
    public function getIndependiente()
    {
        return $this->independiente;
    }

    /**
     * @param mixed $independiente
     */
    public function setIndependiente($independiente)
    {
        $this->independiente = $independiente;
    }

    /**
     * @param mixed $piso
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;
    }

    /**
     * @return mixed
     */
    public function getVista()
    {
        return $this->vista;
    }

    /**
     * @param mixed $vista
     */
    public function setVista($vista)
    {
        $this->vista = $vista;
    }

    /**
     * @return mixed
     */
    public function getLiteras()
    {
        return $this->literas;
    }

    /**
     * @param mixed $literas
     */
    public function setLiteras($literas)
    {
        $this->literas = $literas;
    }


    public function getCamasDobles(): ?int
    {
        return $this->camasDobles;
    }

    public function setCamasDobles(int $camasDobles): self
    {
        $this->camasDobles = $camasDobles;

        return $this;
    }

    public function getCamasSimples(): ?int
    {
        return $this->camasSimples;
    }

    public function setCamasSimples(int $camasSimples): self
    {
        $this->camasSimples = $camasSimples;

        return $this;
    }

    public function getServicios(): ?array
    {
        return $this->servicios;
    }

    public function setServicios(?array $servicios): self
    {
        $this->servicios = $servicios;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCasa(): ?Casa
    {
        return $this->casa;
    }

    public function setCasa(?Casa $casa): self
    {
        $this->casa = $casa;
        return $this;
    }


    public function getType()
    {
        return 'Habitacion';
    }

    /**
     * @ORM\PostPersist()
     */
    public function agregarCapacidad(LifecycleEventArgs $args)
    {
        $casa=$this->casa;
        $em=$args->getEntityManager();
        $casa->setCapacidad($casa->getCapacidad()+($this->getCamasSimples())+($this->getCamasDobles()*2)+($this->getLiteras()*2));
        $em->persist($casa);
        $em->flush();
    }

    /**
     * @ORM\PostRemove()
     */
    public function restarCapacidad(LifecycleEventArgs $args){
        $casa=$this->casa;
        $em=$args->getEntityManager();
        $casa->setCapacidad($casa->getCapacidad()-($this->getCamasSimples()+($this->getCamasDobles()*2)+($this->getLiteras()*2)));
        $em->persist($casa);
        $em->flush();
    }




}
