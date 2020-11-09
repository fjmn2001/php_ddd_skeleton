<?php

declare(strict_types=1);

namespace Medine\Shared\Domain\Criteria;

use InvalidArgumentException;
use Medine\Shared\Domain\ValueObject\Enum;

final class FilterOperator extends Enum
{
    public const EQUAL = '=';
    public const NOT_EQUAL = '!=';
    public const GT = '>';
    public const LT = '<';
    public const CONTAINS = 'CONTAINS';
    public const NOT_CONTAINS = 'NOT_CONTAINS';
    private static $containing = [self::CONTAINS, self::NOT_CONTAINS];

    public static function equal(): self
    {
        return new self('=');
    }

    public function isContaining(): bool
    {
        return in_array($this->value(), self::$containing, true);
    }

    protected function throwExceptionForInvalidValue($value): void
    {
        throw new InvalidArgumentException(sprintf('The filter <%s> is invalid', $value));
    }
}