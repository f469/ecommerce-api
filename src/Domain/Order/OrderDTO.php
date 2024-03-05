<?php

namespace App\Domain\Order;

class OrderDTO
{
    private ?string $id;
    private Cart $cart;
    private \DateTime $date;

    public function __construct(?string $id, Cart $cart, \DateTime $date)
    {
        $this->id = $id;
        $this->cart = $cart;
        $this->date = $date;
    }
}
