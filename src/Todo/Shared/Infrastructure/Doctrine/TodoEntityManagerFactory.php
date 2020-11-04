<?php

declare(strict_types=1);

namespace Medine\Todo\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Medine\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class TodoEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../etc/databases/todo.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Todo', 'Medine\Todo')
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../Todo', 'Todo');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}