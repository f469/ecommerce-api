<?php

namespace App\Domain\Payment;

use App\Domain\Id;

class Payment
{
    private $id;
    private \DateTime $date;
    private Type $type;

    public function __construct(
        Type $type,
        Id $id
    ) {
        $this->id = $id->generate();

        $this->type = $type;
        $this->date = new \DateTime();
    }

    public function data(): PaymentDTO
    {
        return new PaymentDTO($this->id, $this->date, $this->type);
    }
}
