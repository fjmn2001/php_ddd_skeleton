<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\Tasks;

use Medine\Shared\Infrastructure\Symfony\ApiController;
use Medine\Todo\Tasks\Application\Create\CreateTaskCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class TasksPutController extends ApiController
{
    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(
            new CreateTaskCommand(
                $id,
                $request->request->get('name')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}