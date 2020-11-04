<?php

declare(strict_types=1);

namespace Medine\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\each;

final class DatabaseConnections
{
    private $connections;

    public function __construct(iterable $connections)
    {
        $this->connections = iterator_to_array($connections);
    }

    public function clear(): void
    {
        each(function (EntityManager $entityManager) {
            $entityManager->clear();
        }, $this->connections);
    }

    public function truncate(): void
    {
        apply(new MySqlDatabaseCleaner(), array_values($this->connections));
    }
}