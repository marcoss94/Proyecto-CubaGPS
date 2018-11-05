<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContadorRepository")
 */
class Contador
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
    private $newMessages=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $newComments=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $preReserve=0;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewMessages(): ?int
    {
        return $this->newMessages;
    }

    /**
     * @return mixed
     */
    public function getNewComments()
    {
        return $this->newComments;
    }

    /**
     * @param mixed $newMComments
     */
    public function setNewComments($newComments)
    {
        $this->newComments = $newComments;
    }

    /**
     * @return mixed
     */
    public function getPreReserve()
    {
        return $this->preReserve;
    }

    /**
     * @param mixed $preReserve
     */
    public function setPreReserve($preReserve)
    {
        $this->preReserve = $preReserve;
    }

    public function setNewMessages(int $newMessages): self
    {
        $this->newMessages = $newMessages;

        return $this;
    }
}
