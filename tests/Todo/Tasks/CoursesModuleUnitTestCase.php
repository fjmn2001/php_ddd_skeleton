<?php

declare(strict_types=1);

namespace Medine\Tests\Todo\Tasks;

use Medine\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Medine\Todo\Tasks\Domain\Task;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskRepository;
use Mockery\MockInterface;

abstract class CoursesModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Task $task): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($task))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(TaskId $id, ?Task $task): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($task);
    }

    /** @return TaskRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(TaskRepository::class);
    }
}