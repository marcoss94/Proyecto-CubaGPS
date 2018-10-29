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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewMessages(): ?int
    {
        return $this->newMessages;
    }

    public function setNewMessages(int $newMessages): self
    {
        $this->newMessages = $newMessages;

        return $this;
    }
}
