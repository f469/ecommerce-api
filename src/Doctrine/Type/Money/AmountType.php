<?php

namespace App\Doctrine\Type\Money;

use App\Domain\Money\Amount;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DecimalType;

class AmountType extends DecimalType
{
    public function convertToPHPValue($value, AbstractPlatform $platform): Amount
    {
        return new Amount($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->toString();
    }

    public function getName(): string
    {
        return 'amount';
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
