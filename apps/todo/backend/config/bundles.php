<?php

declare(strict_types=1);

$bundles = [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true]
];

$suggestedBundles = [];

return array_merge($bundles, $suggestedBundles);