<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain;

interface DrinkType
{
    public function name(): string;

    public function price(): float;
}