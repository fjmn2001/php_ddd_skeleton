<?php

declare(strict_types=1);

namespace Medine\Shared\Infrastructure\Bus\Command;

use Medine\Shared\Domain\Bus\Command\Command;
use RuntimeException;

class CommandNotRegisteredError extends RuntimeException
{
    public function __construct(?Command $command)
    {
        $commandClass = $command ? get_class($command) : 'null';
        parent::__construct("The command <$commandClass> hasn't a command handler associated");
    }
}