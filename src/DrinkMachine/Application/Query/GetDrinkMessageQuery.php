<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\DrinkMachine\Application\Query;

use GetWith\CoffeeMachine\DrinkMachine\Domain\DrinkType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Factory\DrinkTypeFactory;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Money;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Sugar;
use GetWith\CoffeeMachine\Shared\Application\Query;

final class GetDrinkMessageQuery implements Query
{
    /** @var DrinkType */
    private $drink_type;
    /** @var Money */
    private $price;
    /** @var Sugar */
    private $sugar;
    /** @var bool */
    private $extra_hot;

    public function __construct(
        string $drink_type,
        float $price,
        int $sugar,
        bool $extra_hot
    ) {
        $this->drink_type = $drink_type;
        $this->price = $price;
        $this->sugar = $sugar;
        $this->extra_hot = $extra_hot;
    }

    public function drinkType(): DrinkType
    {
        return DrinkTypeFactory::build($this->drink_type);
    }

    public function price(): Money
    {
        return new Money($this->price);
    }

    public function sugar(): Sugar
    {
        return new Sugar($this->sugar);
    }

    public function extraHot(): bool
    {
        return $this->extra_hot ?? false;
    }
}