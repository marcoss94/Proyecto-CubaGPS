<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SistemRepository")
 */
class Sistem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $code;

    /**
     * @return boolean
     */
    public function isFirst(): bool
    {
        return $this->first;
    }

    /**
     * @param boolean $first
     */
    public function setFirst(bool $first)
    {
        $this->first = $first;
    }

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $first=true;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getRegistered(): string
    {
        return $this->registered;
    }

    /**
     * @param string $registered
     */
    public function setRegistered(string $registered)
    {
        $this->registered = $registered;
    }

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $registered;

    public function getId(): ?int
    {
        return $this->id;
    }


}
