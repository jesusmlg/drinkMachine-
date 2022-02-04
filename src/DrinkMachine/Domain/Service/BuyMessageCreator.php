<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\Service;

use GetWith\CoffeeMachine\DrinkMachine\Domain\Aggregate\Drink;
use GetWith\CoffeeMachine\DrinkMachine\Domain\DrinkType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Sugar;

class BuyMessageCreator
{
    public function message(Drink $drink): string
    {
        return $this->orderedDrinkText($drink->drinkType()) .
            $this->extraHotText($drink->extraHot()) .
            $this->sugarText($drink->sugar());
    }

    private function orderedDrinkText(DrinkType $drink_type): string
    {
        return sprintf('You have ordered a %s', $drink_type->name());
    }

    private function extraHotText(bool $extra_hot): string
    {
        return $extra_hot
            ? ' extra hot'
            : '';
    }

    private function sugarText(Sugar $sugar_quantity): string
    {
        return ($sugar_quantity->value() > 0)
            ? ' with ' . $sugar_quantity->value() . ' sugars (stick included)'
            : '';
    }
}