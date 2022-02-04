<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Domain\Aggregate;

use GetWith\CoffeeMachine\DrinkMachine\Domain\DrinkType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Event\GotDrinkEvent;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\InsufficientMoneyException;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Money;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Sugar;
use GetWith\CoffeeMachine\Shared\Domain\Aggregate\AggregateRoot;

class Drink extends AggregateRoot
{
    /** @var DrinkType */
    private $drink_type;
    /** @var Money */
    private $money;
    /** @var Sugar */
    private $sugar;
    /** @var bool|null */
    private $extra_hot;

    public function __construct(
        DrinkType $drink_type,
        Money $money,
        Sugar $sugar,
        bool $extra_hot = false
    )
    {
        $this->drink_type = $drink_type;
        $this->money = $money;
        $this->sugar = $sugar;
        $this->extra_hot = $extra_hot;

        $this->assertValidPrice();

        $this->record(
            new GotDrinkEvent(uniqid('', true), $this)
        );
    }

    public function drinkType(): DrinkType
    {
        return $this->drink_type;
    }

    public function money(): Money
    {
        return $this->money;
    }

    public function sugar(): Sugar
    {
        return $this->sugar;
    }

    public function extraHot(): ?bool
    {
        return $this->extra_hot;
    }

    public function assertValidPrice(): void
    {
        if ($this->money->value() < $this->drinkType()->price()) {
            throw new InsufficientMoneyException($this->drink_type, $this->drinkType()->price());
        }
    }
}