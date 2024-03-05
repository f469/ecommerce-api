<?php

namespace App\Domain\Order;

use App\Domain\Money\Amount;
use Symfony\Component\Uid\Uuid;

class Cart
{
    private string $id;
    /**
     * @var array<CartLine>
     */
    private array $lines;

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

    public function addLine(CartLine $cartLine): void
    {
        $this->lines[] = $cartLine;
    }

    public function computePriceSum(): Amount
    {
        $sum = new Amount(0);
        foreach ($this->lines as $line) {
            $sum = $sum->add($line->computePrice());
        }

        return $sum;
    }

    public function computeVatSum(): Amount
    {
        $sum = new Amount(0);
        foreach ($this->lines as $line) {
            $sum = $sum->add($line->computeVat());
        }

        return $sum;
    }

    public function computePriceWithVatSum(): Amount
    {
        $sum = new Amount(0);
        foreach ($this->lines as $line) {
            $sum = $sum->add($line->computePriceWithVat());
        }

        return $sum;
    }

    public function data(): CartDTO
    {
        return new CartDTO(
            $this->id
        );
    }
}
