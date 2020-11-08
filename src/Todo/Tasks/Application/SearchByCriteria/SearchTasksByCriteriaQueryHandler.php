<?php

declare(strict_types=1);

namespace Medine\Todo\Tasks\Application\SearchByCriteria;

use Medine\Shared\Domain\Bus\Query\QueryHandler;
use Medine\Shared\Domain\Criteria\Filters;
use Medine\Shared\Domain\Criteria\Order;
use Medine\Todo\Tasks\Application\TaskResponse;

final class SearchTasksByCriteriaQueryHandler implements QueryHandler
{
    private $searcher;

    public function __construct(TasksByCriteriaSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchTasksByCriteriaQuery $query): TaskResponse
    {
        $filters = Filters::fromValues($query->filters());
        $order = Order::fromValues($query->orderBy(), $query->order());

        return $this->searcher->search($filters, $order, $query->limit(), $query->offset());
    }
}