<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Domain;

use Medine\Shared\Domain\Criteria\Criteria;

interface TaskRepository
{
    public function save(Task $task): void;

    public function search(TaskId $id): ?Task;

    public function matching(Criteria $criteria): array;
}