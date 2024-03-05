<?php

namespace App\Domain\Payment;

enum Type: string
{
    case Card = 'card';
    case Paypal = 'paypal';
}
