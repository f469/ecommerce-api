<?php

namespace App\Domain\Payment;

class PaymentDTO
{
    private $id;
    private \DateTime $date;
    private Type $type;

    public function __construct($id, \DateTime $date, Type $type)
    {
        $this->id = $id;
        $this->date = $date;
        $this->type = $type;
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

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }
}
