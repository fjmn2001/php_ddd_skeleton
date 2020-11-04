<?php

declare(strict_types=1);

namespace Medine\Tests\Todo\Tasks\Domain;

use Medine\Tests\Shared\Domain\UuidMother;
use Medine\Todo\Tasks\Domain\TaskId;

final class TaskIdMother
{
    public static function create(string $value): TaskId
    {
        return new TaskId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): TaskId
    {
        return self::create(UuidMother::random());
    }
}