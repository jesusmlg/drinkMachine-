<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\Exception;

use Exception;
use GetWith\CoffeeMachine\DrinkMachine\Domain\DrinkType;

final class InsufficientMoneyException extends Exception
{
    /**
     * @param DrinkType $drink_type
     * @param float $price
     */
    public function __construct(
        DrinkType $drink_type,
        float $price
    ) {
        parent::__construct(
            sprintf('The %s costs %s.', $drink_type->name(), $price)
        );
    }
}