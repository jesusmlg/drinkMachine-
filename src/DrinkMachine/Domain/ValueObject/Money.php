<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject;

use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\MoneyCantBeZeroOrLessException;

final class Money
{
    /** @var float */
    private $value;

    public function __construct(float $value)
    {
        $this->assertGreaterThanZero($value);
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    private function assertGreaterThanZero(float $value): void
    {
        if ($value <= 0) {
            throw new MoneyCantBeZeroOrLessException();
        }
    }
}