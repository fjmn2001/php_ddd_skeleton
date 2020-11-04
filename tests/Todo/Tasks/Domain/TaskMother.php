<?php

declare(strict_types=1);

namespace Medine\Tests\Todo\Tasks\Domain;

use Medine\Todo\Tasks\Application\Create\CreateTaskCommand;
use Medine\Todo\Tasks\Domain\Task;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskName;

final class TaskMother
{
    public static function create(TaskId $id, TaskName $name): Task
    {
        return new Task($id, $name);
    }

    public static function fromRequest(CreateTaskCommand $request): Task
    {
        return self::create(
            TaskIdMother::create($request->id()),
            TaskNameMother::create($request->name())
        );
    }

    public static function random(): Task
    {
        return self::create(TaskIdMother::random(), TaskNameMother::random());
    }
}