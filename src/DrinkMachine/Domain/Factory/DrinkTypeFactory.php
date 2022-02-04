<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\Factory;

use GetWith\CoffeeMachine\DrinkMachine\Domain\ChocolateType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\CoffeeType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\DrinkType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\InvalidDrinkTypeException;
use GetWith\CoffeeMachine\DrinkMachine\Domain\TeaType;

final class DrinkTypeFactory
{
    public static function build(string $drink_type): DrinkType
    {
        switch ($drink_type) {
            case CoffeeType::NAME:
                return new CoffeeType();
            case TeaType::NAME:
                return new TeaType();
            case ChocolateType::NAME:
                return new ChocolateType();
        }

        throw new InvalidDrinkTypeException();
    }
}