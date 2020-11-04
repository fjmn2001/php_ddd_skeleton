<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Backend\Controller\Tasks;

use Symfony\Component\HttpFoundation\Response;

final class TasksPutController
{
    public function __invoke(): Response
    {
        return new Response('', Response::HTTP_CREATED);
    }
}