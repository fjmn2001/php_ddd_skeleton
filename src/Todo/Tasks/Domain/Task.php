<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Domain;

use Medine\Shared\Domain\Aggregate\AggregateRoot;

final class Task extends AggregateRoot
{
    private $id;
    private $name;

    public function __construct(TaskId $id, TaskName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(TaskId $id, TaskName $name): self
    {
        $task = new self($id, $name);

        $task->record(new TaskCreatedDomainEvent($id->value(), $name->value()));

        return $task;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function name(): TaskName
    {
        return $this->name;
    }

    public function rename(TaskName $newName): void
    {
        $this->name = $newName;
    }
}