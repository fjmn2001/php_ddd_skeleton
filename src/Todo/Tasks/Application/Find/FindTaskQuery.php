<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\Find;

use Medine\Shared\Domain\Bus\Query\Query;

final class FindTaskQuery implements Query
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}