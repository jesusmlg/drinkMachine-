<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Services;

use GetWith\CoffeeMachine\Domain\Drink;

final class BuyMessageCreator
{
    /** @var Drink */
    private $drink;

    public function __construct(Drink $drink)
    {
        $this->drink = $drink;
    }

    public function message(): string
    {
        return $this->orderedDrinkText() .
            $this->extraHotText() .
            $this->sugarText();
    }

    private function orderedDrinkText(): string
    {
        return sprintf('You have ordered a %s', $this->drink->drinkType()->value());
    }

    private function extraHotText(): string
    {
        return $this->drink->extraHot()
            ? ' extra hot'
            : '';
    }

    private function sugarText(): string
    {
        return ($this->drink->sugar()->value() > 0)
            ? ' with ' . $this->drink->sugar()->value() . ' sugars (stick included)'
            : '';
    }
}