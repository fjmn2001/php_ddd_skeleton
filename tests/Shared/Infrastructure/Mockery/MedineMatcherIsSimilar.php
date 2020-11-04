<?php

declare(strict_types=1);

namespace Medine\Tests\Shared\Infrastructure\Mockery;

use Medine\Tests\Shared\Infrastructure\PhpUnit\Constraint\MedineConstraintIsSimilar;
use Mockery\Matcher\MatcherAbstract;

final class MedineMatcherIsSimilar extends MatcherAbstract
{
    private $constraint;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);

        $this->constraint = new MedineConstraintIsSimilar($value, $delta);
    }

    public function match(&$actual): bool
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString(): string
    {
        return 'Is similar';
    }
}