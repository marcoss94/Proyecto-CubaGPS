<?php

namespace App\Entity;

use Beelab\PaypalBundle\Entity\Transaction as BaseTransaction;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Transaction extends BaseTransaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    // if you need other properties, or relationships, add them here...

    public function getDescription(): ?string
    {
        // here you can return a generic description, if you don't want to list items
    }

    public function getItems(): array
    {
        // here you can return an array of items, with each item being an array of name, quantity, price
        // Note that if the total (price * quantity) of items doesn't match total amount, this won't work
    }

    public function getShippingAmount(): string
    {
        // here you can return shipping amount. This amount MUST be already in your total amount
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}
