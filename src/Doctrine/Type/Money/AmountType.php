<?php

namespace App\Doctrine\Type\Money;

use App\Domain\Money\Amount;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DecimalType;

class AmountType extends DecimalType
{
    public const string NAME = 'amount';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Amount($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->toString();
    }

    public function getName()
    {
        return self::NAME; // modify to match your constant name
    }
}
