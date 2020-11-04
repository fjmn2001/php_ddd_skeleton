<?php

declare(strict_types=1);

namespace Medine\Tests\Shared\Domain;

use Medine\Tests\Shared\Infrastructure\Mockery\MedineMatcherIsSimilar;
use Medine\Tests\Shared\Infrastructure\PhpUnit\Constraint\MedineConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new MedineConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new MedineConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

    public static function similarTo($value, $delta = 0.0): MedineMatcherIsSimilar
    {
        return new MedineMatcherIsSimilar($value, $delta);
    }
}