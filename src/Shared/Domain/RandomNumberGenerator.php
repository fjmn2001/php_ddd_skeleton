<?php

declare(strict_types=1);

namespace Medine\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}