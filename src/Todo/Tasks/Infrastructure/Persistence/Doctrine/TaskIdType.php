<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Infrastructure\Persistence\Doctrine;

use Medine\Shared\Infrastructure\Persistence\Doctrine\UuidType;
use Medine\Todo\Tasks\Domain\TaskId;

final class TaskIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return TaskId::class;
    }
}