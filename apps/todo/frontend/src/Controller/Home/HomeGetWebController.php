<?php

declare(strict_types=1);

namespace Medine\Apps\Todo\Frontend\Controller\Home;

use Medine\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class HomeGetWebController extends WebController
{
    public function __invoke(Request $request): Response
    {
        return $this->render(
            'pages/home.html.twig',
            [
                'title' => 'Welcome',
                'description' => 'Medine.dev - Backoffice',
            ]
        );
    }

    protected function exceptions(): array
    {
        return [];
    }
}