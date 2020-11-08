<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\Tasks;

use Medine\Shared\Infrastructure\Symfony\ApiController;
use Medine\Todo\Tasks\Application\SearchByCriteria\SearchTasksByCriteriaQuery;
use Medine\Todo\Tasks\Application\TaskResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use function Lambdish\Phunctional\map;

final class TasksGetController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        /** @var TaskResponse $response */
        $response = $this->ask(
            new SearchTasksByCriteriaQuery(
                $request->query->get('filters', []),
                $request->query->get('order_by'),
                $request->query->get('order'),
                $request->query->get('limit'),
                $request->query->get('offset')
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