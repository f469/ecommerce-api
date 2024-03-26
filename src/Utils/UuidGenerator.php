<?php

namespace App\Utils;

use Symfony\Component\Uid\Uuid as UuidComponent;

class UuidGenerator implements \App\Domain\Id
{
    #[\Override]
    public function generate(): string
    {
        return UuidComponent::v7();
    }
}
