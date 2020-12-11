<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Domain;

use Medine\Shared\Domain\DomainError;

final class TaskNotExists extends DomainError
{
    private $id;

    public function __construct(TaskId $id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function errorCode(): string
    {
        return 'task_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The task <%s> does not exist', $this->id->value());
    }
}