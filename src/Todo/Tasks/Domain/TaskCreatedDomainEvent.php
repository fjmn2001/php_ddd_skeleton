<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Domain;

use Medine\Shared\Domain\Bus\Event\DomainEvent;

final class TaskCreatedDomainEvent extends DomainEvent
{
    private $name;

    public function __construct(
        string $id,
        string $name,
        string $eventId = null,
        string $occurredOn = null
    )
    {
        parent::__construct($id, $eventId, $occurredOn);

        $this->name = $name;
    }

    public static function eventName(): string
    {
        return 'task.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent
    {
        return new self($aggregateId, $body['name'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name
        ];
    }

    public function name(): string
    {
        return $this->name;
    }
}