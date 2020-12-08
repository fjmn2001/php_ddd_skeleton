<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\Update;

use Medine\Shared\Domain\Bus\Command\CommandHandler;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskName;

final class UpdateTaskCommandHandler implements CommandHandler
{
    private $updater;

    public function __construct(TaskUpdater $updater)
    {
        $this->updater = $updater;
    }

    public function __invoke(UpdateTaskCommand $command): void
    {
        $id = new TaskId($command->id());
        $name = new TaskName($command->name());

        $this->updater->__invoke($id, $name);
    }
}