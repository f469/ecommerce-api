<?php

namespace App\Domain;

interface Id
{
    public function generate(): string;
}
