<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\Exception;

use Exception;

final class MoneyCantBeZeroOrLessException extends Exception
{
    public function __construct()
    {
        parent::__construct('Money cant be less than zero');
    }
}