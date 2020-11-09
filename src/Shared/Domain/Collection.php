<?php

declare(strict_types=1);

namespace Medine\Shared\Domain;

use ArrayIterator;
use function Lambdish\Phunctional\each;

abstract class Collection implements \Countable, \IteratorAggregate
{
    private $items;

    public function __construct(array $items)
    {
        Assert::arrayOf($this->type(), $items);

        $this->items = $items;
    }

    abstract protected function type(): string;

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items());
    }

    public function count(): int
    {
        return count($this->items());
    }

    protected function each(callable $fn): void
    {
        each($fn, $this->items());
    }

    protected function items(): array
    {
        return $this->items;
    }
}