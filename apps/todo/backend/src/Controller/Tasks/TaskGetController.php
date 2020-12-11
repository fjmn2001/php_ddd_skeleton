<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\Tasks;

use Medine\Shared\Infrastructure\Symfony\ApiController;
use Medine\Todo\Tasks\Application\Find\FindTaskQuery;
use Medine\Todo\Tasks\Application\SearchByCriteria\SearchTasksByCriteriaQuery;
use Medine\Todo\Tasks\Application\TaskResponse;
use Medine\Todo\Tasks\Application\TasksResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use function Lambdish\Phunctional\map;

final class TaskGetController extends ApiController
{
    public function __invoke(string $id): JsonResponse
    {
        /** @var TasksResponse $response */
        $response = $this->ask(new FindTaskQuery($id));

        return new JsonResponse(
            [
                'id' => $response->id(),
                'name' => $response->name()
            ],
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }

    protected function exceptions(): array
    {
        return [];
    }
}