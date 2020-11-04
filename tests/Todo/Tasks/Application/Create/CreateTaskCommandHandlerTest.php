<?php

declare(strict_types=1);

namespace Medine\Tests\Todo\Tasks\Application\Create;

use Medine\Tests\Todo\Tasks\CoursesModuleUnitTestCase;
use Medine\Tests\Todo\Tasks\Domain\TaskCreatedDomainEventMother;
use Medine\Tests\Todo\Tasks\Domain\TaskMother;
use Medine\Todo\Tasks\Application\Create\CreateTaskCommandHandler;
use Medine\Todo\Tasks\Application\Create\TaskCreator;

final class CreateTaskCommandHandlerTest extends CoursesModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateTaskCommandHandler(new TaskCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_task(): void
    {
        $command = CreateCourseCommandMother::random();

        $task = TaskMother::fromRequest($command);
        $domainEvent = TaskCreatedDomainEventMother::fromTask($task);

        $this->shouldSave($task);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}