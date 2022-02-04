<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Exception;

use Exception;

final class InvalidSugarQuantityException extends Exception
{
    public function __construct()
    {
        parent::__construct('The number of sugars should be between 0 and 2.');
    }
}