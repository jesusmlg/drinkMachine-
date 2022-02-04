<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain;

final class TeaType implements DrinkType
{
    /** @var float  */
    private const PRICE = 0.4;
    /** @var string  */
    public const NAME = 'tea';

    public function name(): string
    {
        return self::NAME;
    }

    public function price(): float
    {
        return self::PRICE;
    }
}