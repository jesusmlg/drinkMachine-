<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain;

final class CoffeeType implements DrinkType
{
    /** @var float */
    private const PRICE = 0.5;
    /** @var string */
    public const NAME = 'coffee';

    public function name(): string
    {
        return self::NAME;
    }

    public function price(): float
    {
        return self::PRICE;
    }
}