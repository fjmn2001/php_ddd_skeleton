<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\HealthCheck;

use Medine\Shared\Domain\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckGetController
{
    private $generator;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'todo-backend' => 'ok',
            'rand' => $this->generator->generate()
        ]);
    }
}