<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain;

final class ChocolateType implements DrinkType
{
    /** @var float */
    private const PRICE = 0.6;
    /** @var string */
    public const NAME = 'chocolate';

    public function name(): string
    {
        return self::NAME;
    }

    public function price(): float
    {
        return self::PRICE;
    }
}