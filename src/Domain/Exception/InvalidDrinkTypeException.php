<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Exception;

use Exception;

final class InvalidDrinkTypeException extends Exception
{
    public function __construct()
    {
        parent::__construct('The drink type should be tea, coffee or chocolate.');
    }
}