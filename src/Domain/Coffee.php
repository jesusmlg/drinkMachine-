<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain;

use GetWith\CoffeeMachine\Domain\Exception\InsufficientMoneyException;
use GetWith\CoffeeMachine\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Domain\ValueObject\Price;
use GetWith\CoffeeMachine\Domain\ValueObject\SugarQuantity;

final class Coffee implements Drink
{
    /** @var float  */
    private const PRICE = 0.5;
    /** @var DrinkType */
    private $drink_type;
    /** @var Price */
    private $price;
    /** @var SugarQuantity */
    private $sugar;
    /** @var bool|null */
    private $extra_hot;

    public function __construct(
        DrinkType $drink_type,
        Price $price,
        SugarQuantity $sugar,
        bool $extra_hot = false
    )
    {
        $this->drink_type = $drink_type;
        $this->price = $price;
        $this->sugar = $sugar;
        $this->extra_hot = $extra_hot;

        $this->assertValidPrice();
    }

    public function drinkType(): DrinkType
    {
        return $this->drink_type;
    }

    public function price(): Price
    {
        return $this->price;
    }

    public function sugar(): SugarQuantity
    {
        return $this->sugar;
    }

    public function extraHot(): ?bool
    {
        return $this->extra_hot;
    }

    public function assertValidPrice(): void
    {
        if ($this->price->value() < self::PRICE) {
            throw new InsufficientMoneyException($this->drink_type, self::PRICE);
        }
    }
}