<?php

namespace App\Domain\Payment;

class PaymentDTO
{
    private $id;
    private \DateTime $date;

    public function __construct($id, \DateTime $date)
    {
        $this->id = $id;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }
}
