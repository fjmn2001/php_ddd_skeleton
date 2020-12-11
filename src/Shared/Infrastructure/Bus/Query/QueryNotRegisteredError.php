<?php

declare(strict_types=1);

namespace Medine\Shared\Infrastructure\Bus\Query;

use Medine\Shared\Domain\Bus\Query\Query;
use RuntimeException;

final class QueryNotRegisteredError extends RuntimeException
{

    public function __construct(?Query $query)
    {
        $queryClass = $query ? get_class($query) : 'null';

        parent::__construct("The query <$queryClass> hasn't a query handler associated");
    }
}