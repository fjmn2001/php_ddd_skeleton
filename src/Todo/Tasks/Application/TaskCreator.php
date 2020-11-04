<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application;

use Medine\Shared\Domain\Bus\Event\EventBus;
use Medine\Todo\Tasks\Domain\Task;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskName;
use Medine\Todo\Tasks\Domain\TaskRepository;

final class TaskCreator
{
    private $repository;
    private $bus;

    public function __construct(TaskRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function __invoke(TaskId $id, TaskName $name): void
    {
        $task = Task::create($id, $name);

        $this->repository->save($task);
        $this->bus->publish(...$task->pullDomainEvents());
    }
}