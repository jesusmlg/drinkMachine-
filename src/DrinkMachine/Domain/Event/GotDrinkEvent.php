<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\Event;

use GetWith\CoffeeMachine\DrinkMachine\Domain\Aggregate\Drink;
use GetWith\CoffeeMachine\Shared\Domain\Event\DomainEvent;

final class GotDrinkEvent extends DomainEvent
{
    /** @var Drink */
    private $drink;

    public function __construct(
        string $aggregate_id,
        Drink $drink
    )
    {
        parent::__construct($aggregate_id);
        $this->drink = $drink;
    }

    public static function eventName(): string
    {
        return 'drink.got';
    }

    public function toPrimitives(): array
    {
        return [
            'type' => $this->drink->drinkType()->name(),
            'price' => $this->drink->money()->value(),
            'sugar' => $this->drink->sugar()->value(),
            'extra-hot' => $this->drink->extraHot(),
        ];
    }
}