<?php

declare(strict_types=1);

namespace Medine\Tests\Todo\Tasks\Application\Create;

use Medine\Tests\Todo\Tasks\Domain\TaskIdMother;
use Medine\Tests\Todo\Tasks\Domain\TaskNameMother;
use Medine\Todo\Tasks\Application\Create\CreateTaskCommand;
use Medine\Todo\Tasks\Domain\TaskId;
use Medine\Todo\Tasks\Domain\TaskName;

final class CreateCourseCommandMother
{
    public static function create(TaskId $id, TaskName $name): CreateTaskCommand
    {
        return new CreateTaskCommand($id->value(), $name->value());
    }

    public static function random(): CreateTaskCommand
    {
        return self::create(TaskIdMother::random(), TaskNameMother::random());
    }
}