<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Application;

use GetWith\CoffeeMachine\Application\Query\GetDrinkMessageQuery;
use GetWith\CoffeeMachine\Domain\Services\BuyMessageCreator;
use GetWith\CoffeeMachine\Domain\Factory\DrinkFactory;

final class GetDrinkMessageHandler
{
    /** @var DrinkFactory */
    private $drink_factory;

    public function __construct(DrinkFactory $drink_factory)
    {
        $this->drink_factory = $drink_factory;
    }

    public function __invoke(GetDrinkMessageQuery $query): string
    {
        $drink = $this->drink_factory::build(
            $query->drinkType(),
            $query->price(),
            $query->sugar(),
            $query->extraHot()
        );

        $buy_message_creator = new BuyMessageCreator($drink);

        return $buy_message_creator->message();
    }
}