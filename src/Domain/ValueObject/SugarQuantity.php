<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\ValueObject;

use GetWith\CoffeeMachine\Domain\Exception\InvalidSugarQuantityException;

final class SugarQuantity
{
    private $value;

    public function __construct(int $value)
    {
        $this->assertValidQuantity($value);
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    private function assertValidQuantity(int $value): void
    {
        if ($value > 2 || $value < 0) {
            throw new InvalidSugarQuantityException();
        }
    }
}