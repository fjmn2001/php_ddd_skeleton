<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\Tasks;

use Medine\Shared\Infrastructure\Symfony\ApiController;
use Medine\Todo\Tasks\Application\SearchByCriteria\SearchTasksByCriteriaQuery;
use Medine\Todo\Tasks\Application\TaskResponse;
use Medine\Todo\Tasks\Application\TasksResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use function Lambdish\Phunctional\map;

final class TasksGetController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        /** @var TasksResponse $response */
        $response = $this->ask(
            new SearchTasksByCriteriaQuery(
                $request->get('filters', []),
                $request->get('order_by'),
                $request->get('order'),
                $request->get('limit'),
                $request->get('offset')
            )
        );

        return new JsonResponse(
            map(
                function (TaskResponse $task) {
                    return [
                        'id' => $task->id(),
                        'name' => $task->name()
                    ];
                },
                $response->tasks()
            ),
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }

    protected function exceptions(): array
    {
        return [];
    }
}