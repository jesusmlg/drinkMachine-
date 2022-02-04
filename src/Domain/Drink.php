<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain;

use GetWith\CoffeeMachine\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Domain\ValueObject\Price;
use GetWith\CoffeeMachine\Domain\ValueObject\SugarQuantity;

interface Drink
{
    public function drinkType(): DrinkType;
    public function price(): Price;
    public function sugar(): SugarQuantity;
    public function extraHot(): ?bool;
    public function assertValidPrice(): void;
}