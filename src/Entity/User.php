<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 *
 * Defines the properties of the User entity to represent the application users.
 * See https://symfony.com/doc/current/book/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See https://symfony.com/doc/current/cookbook/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(type="string",length=50,nullable=true)
     */
    private $facebookId;


    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(type="string",nullable=true)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(type="string",nullable=true)
     */
    private $email = '';

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $registeredAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string",nullable=true)
     */
    private $userOf;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $redirectedBy;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="redirectedBy")
     */
    private $usersRedirected;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentario", mappedBy="autor", orphanRemoval=true)
     */
    private $comentarios;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reserva", mappedBy="usuario")
     */
    private $reservas;





    public function __construct()
    {
        $this->usersRedirected = new ArrayCollection();
        $this->comentarios = new ArrayCollection();
        $this->reservas = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUserOf()
    {
        return $this->userOf;
    }

    /**
     * @param string $userOf
     */
    public function setUserOf($userOf)
    {
        $this->userOf = $userOf;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRegisteredAt()
    {
        return $this->registeredAt;
    }

    /**
     * @param mixed $registeredAt
     */
    public function setRegisteredAt()
    {
        $this->registeredAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername()
    {
        return $this->getId();
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param int $facebookId
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * {@inheritdoc}
     */
    public function getSalt(): ?string
    {
        // See "Do you need to use a Salt?" at https://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one

        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        return serialize([$this->id, $this->firstname . ' ' . $this->lastname, $this->password]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        [$this->id, $this->username, $this->password] = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getRedirectedBy(): ?self
    {
        return $this->redirectedBy;
    }

    public function setRedirectedBy(?self $redirectedBy): self
    {
        $this->redirectedBy = $redirectedBy;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsersRedirected(): Collection
    {
        return $this->usersRedirected;
    }

    public function addUsersRedirected(User $usersRedirected): self
    {
        if (!$this->usersRedirected->contains($usersRedirected)) {
            $this->usersRedirected[] = $usersRedirected;
            $usersRedirected->setRedirectedBy($this);
        }
        return $this;
    }

    public function removeUsersRedirected(User $usersRedirected): self
    {
        if ($this->usersRedirected->contains($usersRedirected)) {
            $this->usersRedirected->removeElement($usersRedirected);
            // set the owning side to null (unless already changed)
            if ($usersRedirected->getRedirectedBy() === $this) {
                $usersRedirected->setRedirectedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comentario[]
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(Comentario $comentario): self
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios[] = $comentario;
            $comentario->setAutor($this);
        }

        return $this;
    }

    public function removeComentario(Comentario $comentario): self
    {
        if ($this->comentarios->contains($comentario)) {
            $this->comentarios->removeElement($comentario);
            // set the owning side to null (unless already changed)
            if ($comentario->getAutor() === $this) {
                $comentario->setAutor(null);
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
            $reserva->setUsuario($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): self
    {
        if ($this->reservas->contains($reserva)) {
            $this->reservas->removeElement($reserva);
            // set the owning side to null (unless already changed)
            if ($reserva->getUsuario() === $this) {
                $reserva->setUsuario(null);
            }
        }

        return $this;
    }


}
