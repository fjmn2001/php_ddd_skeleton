<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\Tasks;

use Medine\Shared\Infrastructure\Symfony\ApiController;
use Medine\Todo\Tasks\Application\Create\CreateTaskCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class TasksPostController extends ApiController
{
    public function __invoke(Request $request): Response
    {

        $this->dispatch(
            new CreateTaskCommand(
                $request->get('id'),
                $request->get('name')
            )
        );

        return new Response(
            '',
            Response::HTTP_CREATED,
            ['Access-Control-Allow-Origin' => '*']
        );
    }

    protected function exceptions(): array
    {
        return [];
    }
}