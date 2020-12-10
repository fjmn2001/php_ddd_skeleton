<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\Update;

use Medine\Shared\Domain\Bus\Command\Command;

final class UpdateTaskCommand2 //implements Command
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