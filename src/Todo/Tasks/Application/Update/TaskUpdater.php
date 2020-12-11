<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\Update;

use Medine\Shared\Domain\Bus\Event\EventBus;
use Medine\Todo\Tasks\Application\Find\TaskFinder;
use Medine\Todo\Tasks\Domain\Task;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskName;
use Medine\Todo\Tasks\Domain\TaskRepository;

final class TaskUpdater
{
    private $repository;
    private $bus;
    private $finder;

    public function __construct(TaskRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
        $this->finder = new TaskFinder($repository);
    }

    public function __invoke(TaskId $id, TaskName $newName): void
    {
        $response = $this->finder->__invoke($id);
        $task = new Task(
            new TaskId($response->id()),
            new TaskName($response->name())
        );

        $task->updateName($newName);

        $this->repository->save($task);
        $this->bus->publish(...$task->pullDomainEvents());
    }
}