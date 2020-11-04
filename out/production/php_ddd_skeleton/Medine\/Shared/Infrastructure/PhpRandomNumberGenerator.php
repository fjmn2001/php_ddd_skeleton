<?php

declare(strict_types=1);

namespace Medine\Shared\Infrastructure;

final class PhpRandomNumberGenerator implements \Medine\Shared\Domain\RandomNumberGenerator
{

    public function generate(): int
    {
        return random_int(1, 5);
    }
}