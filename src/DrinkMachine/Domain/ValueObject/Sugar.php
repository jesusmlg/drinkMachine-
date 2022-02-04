<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject;

use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\InvalidSugarQuantityException;

final class Sugar
{
    private $value;
    public const MAX = 2;
    public const MIN = 0;

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
        if ($value > self::MAX || $value < self::MIN) {
            throw new InvalidSugarQuantityException();
        }
    }
}