<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\HealthCheck;

use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckGetController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'todo-backend' => 'ok',
            'rand' => rand()
        ]);
    }
}