<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Factory;

use GetWith\CoffeeMachine\Application\GetDrinkMessageHandler;

final class CreateMessageHandlerFactory
{
    public static function build(): GetDrinkMessageHandler
    {
        return new GetDrinkMessageHandler(
            new DrinkFactory()
        );
    }
}