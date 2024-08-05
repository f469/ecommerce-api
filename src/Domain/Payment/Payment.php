<?php

namespace App\Domain\Payment;

use App\Domain\Id;

class Payment
{
    private $id;
    private \DateTime $date;

    public function __construct(
        Id $id
    ) {
        $this->id = $id->generate();

        $this->date = new \DateTime();
    }

    public function data(): PaymentDTO
    {
        return new PaymentDTO($this->id, $this->date);
    }
}
