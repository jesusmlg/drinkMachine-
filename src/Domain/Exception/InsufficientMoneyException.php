<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Exception;

use Exception;
use GetWith\CoffeeMachine\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Domain\ValueObject\Price;

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
            sprintf('The %s costs %s.', $drink_type->value(), $price
            )
        );
    }
}