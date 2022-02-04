<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Factory;

use GetWith\CoffeeMachine\Domain\Chocolate;
use GetWith\CoffeeMachine\Domain\Coffee;
use GetWith\CoffeeMachine\Domain\Drink;
use GetWith\CoffeeMachine\Domain\Exception\InvalidDrinkTypeException;
use GetWith\CoffeeMachine\Domain\Tea;
use GetWith\CoffeeMachine\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Domain\ValueObject\Price;
use GetWith\CoffeeMachine\Domain\ValueObject\SugarQuantity;

final class DrinkFactory
{
    public static function build(
        DrinkType $drink_type,
        Price $price,
        SugarQuantity $sugar,
        bool $extra_hot
    ): Drink {
        switch ($drink_type->value()) {
            case DrinkType::COFFEE:
                return new Coffee($drink_type, $price, $sugar, $extra_hot);
            case DrinkType::TEA:
                return new Tea($drink_type, $price, $sugar, $extra_hot);
            case DrinkType::CHOCOLATE:
                return new Chocolate($drink_type, $price, $sugar, $extra_hot);
        }

        throw new InvalidDrinkTypeException();
    }
}