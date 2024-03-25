<?php

namespace App\Domain\Order;

class OrderDTO
{
    private ?string $id;
    private Cart $cart;
    private \DateTime $date;

    private string $payment;

    public function __construct(?string $id, Cart $cart, \DateTime $date, string $payment)
    {
        $this->id = $id;
        $this->cart = $cart;
        $this->date = $date;
        $this->payment = $payment;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function setCart(Cart $cart): void
    {
        $this->cart = $cart;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): void
    {
        $this->payment = $payment;
    }
}
