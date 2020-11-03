<?php

declare(strict_types=1);

namespace Medine\Tests\Shared\Infrastructure;

final class PhpStaticNumberGenerator implements \Medine\Shared\Domain\RandomNumberGenerator
{

    public function generate(): int
    {
        return 1;
    }
}