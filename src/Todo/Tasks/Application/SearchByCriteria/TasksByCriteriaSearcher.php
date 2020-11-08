<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\SearchByCriteria;

use Medine\Shared\Domain\Criteria\Criteria;
use Medine\Shared\Domain\Criteria\Filters;
use Medine\Shared\Domain\Criteria\Order;
use Medine\Todo\Tasks\Application\TaskResponse;
use Medine\Todo\Tasks\Domain\Task;
use Medine\Todo\Tasks\Domain\TaskRepository;
use function Lambdish\Phunctional\map;

final class TasksByCriteriaSearcher
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): TaskResponse
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return new TaskResponse(...map($this->toResponse(), $this->repository->matching($criteria)));
    }

    private function toResponse(): callable
    {
        return static function (Task $task) {
            return new TaskResponse(
                $task->id()->value(),
                $task->name()->value()
            );
        };
    }
}