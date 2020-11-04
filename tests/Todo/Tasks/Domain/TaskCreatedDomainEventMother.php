<?php

declare(strict_types=1);

namespace Medine\Tests\Todo\Tasks\Domain;

use Medine\Todo\Tasks\Domain\Task;
use Medine\Todo\Tasks\Domain\TaskCreatedDomainEvent;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskName;

final class TaskCreatedDomainEventMother
{
    public static function create(TaskId $id, TaskName $name): TaskCreatedDomainEvent
    {
        return new TaskCreatedDomainEvent($id->value(), $name->value());
    }

    public static function fromTask(Task $Task): TaskCreatedDomainEvent
    {
        return self::create($Task->id(), $Task->name());
    }

    public static function random(): TaskCreatedDomainEvent
    {
        return self::create(TaskIdMother::random(), TaskNameMother::random());
    }
}