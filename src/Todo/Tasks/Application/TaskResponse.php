<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application;

use Medine\Shared\Domain\Bus\Query\Response;

final class TaskResponse implements Response
{
    private $id;
    private $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}