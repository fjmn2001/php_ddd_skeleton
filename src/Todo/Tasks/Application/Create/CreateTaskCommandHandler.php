<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\Create;

use Medine\Shared\Domain\Bus\Command\CommandHandler;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskName;

final class CreateTaskCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(TaskCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateTaskCommand $command): void
    {
        $id = new TaskId($command->id());
        $name = new TaskName($command->name());

        $this->creator->__invoke($id, $name);
    }
}