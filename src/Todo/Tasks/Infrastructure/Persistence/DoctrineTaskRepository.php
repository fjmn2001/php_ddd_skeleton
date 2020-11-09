<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Infrastructure\Persistence;

use Medine\Shared\Domain\Criteria\Criteria;
use Medine\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use Medine\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use Medine\Todo\Tasks\Domain\Task;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskRepository;

final class DoctrineTaskRepository extends DoctrineRepository implements TaskRepository
{

    public function save(Task $task): void
    {
        $this->persist($task);
    }

    public function search(TaskId $id): ?Task
    {
        return $this->repository(Task::class)->find($id);
    }

    public function matching(Criteria $criteria): array
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria);

        return $this->repository(Task::class)->matching($doctrineCriteria)->toArray();
    }
}