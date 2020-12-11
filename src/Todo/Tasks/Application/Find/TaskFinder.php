<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\Find;

use Medine\Todo\Tasks\Application\TaskResponse;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskNotExists;
use Medine\Todo\Tasks\Domain\TaskRepository;

final class TaskFinder
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(TaskId $id): TaskResponse
    {
        $task = $this->repository->search($id);

        if (null === $task) {
            throw new TaskNotExists($id);
        }

        return new TaskResponse(
            $task->id()->value(),
            $task->name()->value()
        );
    }
}