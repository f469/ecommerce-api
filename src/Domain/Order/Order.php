<?php

namespace App\Domain\Order;

use App\Domain\Id;
use App\Domain\Payment\Payment;

class Order
{
    private string $id;
    private Cart $cart;
    private \DateTime $date;
    private Payment $payment;

    public function __construct(
        Cart $cart,
        \DateTime $date,
        Payment $payment,
        Id $id
    ) {
        $this->id = $id->generate();

        $this->cart = $cart;
        $this->date = $date;
        $this->payment = $payment;
    }

    public function data(): OrderDTO
    {
        return new OrderDTO(
            $this->id,
            $this->cart,
            $this->date,
            $this->payment->data()->getId()
        );
    }

    public function getId(): string
    {
        return $this->id;
    }
}
