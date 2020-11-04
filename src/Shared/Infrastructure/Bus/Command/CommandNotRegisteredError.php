<?php

declare(strict_types=1);

namespace Medine\Shared\Infrastructure\Bus\Command;

final class CommandNotRegisteredError extends \RuntimeException
{

    public function __construct(\Medine\Shared\Domain\Bus\Command\Command $command)
    {
        $commandClass = get_class($command);

        parent::__construct("The command <$commandClass> hasn't a command handler associated");
    }
}