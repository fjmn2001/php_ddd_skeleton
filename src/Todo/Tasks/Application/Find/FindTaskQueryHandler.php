<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\Find;

use Medine\Shared\Domain\Bus\Query\QueryHandler;
use Medine\Todo\Tasks\Application\TaskResponse;
use Medine\Todo\Tasks\Domain\TaskId;

final class FindTaskQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(TaskFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindTaskQuery $query): TaskResponse
    {
        return $this->finder->__invoke(new TaskId($query->id()));
    }
}