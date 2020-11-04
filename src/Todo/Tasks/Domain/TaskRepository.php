<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Domain;

interface TaskRepository
{
    public function save(Task $task): void;

    public function search(TaskId $id): ?Task;
}