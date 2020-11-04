<?php

declare(strict_types=1);

namespace Medine\Shared\Infrastructure\Symfony;

use Medine\Shared\Domain\Bus\Command\Command;
use Medine\Shared\Domain\Bus\Command\CommandBus;
use Medine\Shared\Domain\Bus\Query\Query;
use Medine\Shared\Domain\Bus\Query\QueryBus;
use Medine\Shared\Domain\Bus\Query\Response;
use function Lambdish\Phunctional\each;

abstract class ApiController
{
    private $queryBus;
    private $commandBus;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    )
    {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;

        each(
            function (int $httpCode, string $exceptionClass) use ($exceptionHandler) {
                $exceptionHandler->register($exceptionClass, $httpCode);
            },
            $this->exceptions()
        );
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}