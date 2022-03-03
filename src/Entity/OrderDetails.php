<?php

namespace App\Entity;

use App\Repository\OrderDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderDetailsRepository::class)]
class OrderDetails
{

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Orders::class, inversedBy: 'orderDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $orders;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Cars::class, inversedBy: 'orderDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $cars;

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getCars(): ?Cars
    {
        return $this->cars;
    }

    public function setCars(?Cars $cars): self
    {
        $this->cars = $cars;

        return $this;
    }
}
