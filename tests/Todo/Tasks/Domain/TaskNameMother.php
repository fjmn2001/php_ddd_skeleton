<?php

declare(strict_types=1);

namespace Medine\Tests\Todo\Tasks\Domain;

use Medine\Tests\Shared\Domain\WordMother;
use Medine\Todo\Tasks\Domain\TaskName;

final class TaskNameMother
{
    public static function create(string $value): TaskName
    {
        return new TaskName($value);
    }

    public static function random(): TaskName
    {
        return self::create(WordMother::random());
    }
}