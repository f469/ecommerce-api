<?php

namespace App\Domain\Order;

use App\Domain\Payment\Payment;
use Symfony\Component\Uid\Uuid;

class Order
{
    private string $id;
    private Cart $cart;
    private \DateTime $date;
    private Payment $payment;

    public function __construct(Cart $cart, \DateTime $date, Payment $payment)
    {
        $this->id = Uuid::v7();

        $this->cart = $cart;
        $this->date = $date;
        $this->payment = $payment;
    }
}
