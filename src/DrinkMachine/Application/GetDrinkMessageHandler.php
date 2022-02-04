<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Application;

use GetWith\CoffeeMachine\DrinkMachine\Application\Query\GetDrinkMessageQuery;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Aggregate\Drink;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Service\BuyMessageCreator;
use GetWith\CoffeeMachine\Shared\Application\QueryHandlerInterface;

final class GetDrinkMessageHandler implements QueryHandlerInterface
{
    /** @var BuyMessageCreator */
    private $buy_message_creator;

    public function __construct(BuyMessageCreator $buy_message_creator)
    {
        $this->buy_message_creator = $buy_message_creator;
    }

    public function __invoke(GetDrinkMessageQuery $query): string
    {
        $drink = new Drink(
            $query->drinkType(),
            $query->price(),
            $query->sugar(),
            $query->extraHot()
        );

        //Here I should pull the events and dispatch them to event bus

        return $this->buy_message_creator->message($drink);
    }
}