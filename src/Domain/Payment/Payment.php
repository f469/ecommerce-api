<?php

namespace App\Domain\Payment;

use Symfony\Component\Uid\Uuid;

class Payment
{
    private $id;
    private \DateTime $date;
    private Type $type;

    public function __construct(Type $type)
    {
        $this->id = Uuid::v7();

        $this->type = $type;
        $this->date = new \DateTime();
    }
}
