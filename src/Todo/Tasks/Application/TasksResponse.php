<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application;

use Medine\Shared\Domain\Bus\Query\Response;

final class TasksResponse implements Response
{
    private $tasks;

    public function __construct(TaskResponse ...$tasks)
    {
        $this->tasks = $tasks;
    }

    public function tasks(): array
    {
        return $this->tasks;
    }
}