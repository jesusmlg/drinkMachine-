<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\ValueObject;

use GetWith\CoffeeMachine\Domain\Exception\MoneyCantBeZeroException;

final class Price
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
        if ($value < 0) {
            throw new MoneyCantBeZeroException();
        }
    }
}