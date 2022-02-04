<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Application\Query;

use GetWith\CoffeeMachine\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Domain\ValueObject\Price;
use GetWith\CoffeeMachine\Domain\ValueObject\SugarQuantity;

final class GetDrinkMessageQuery
{
    /** @var DrinkType */
    private $drink_type;
    /** @var Price */
    private $price;
    /** @var SugarQuantity */
    private $sugar;
    /** @var bool */
    private $extra_hot;

    public function __construct(
        string $drink_type,
        float $price,
        int $sugar,
        ?bool $extra_hot
    )
    {
        $this->drink_type = $drink_type;
        $this->price = $price;
        $this->sugar = $sugar;
        $this->extra_hot = $extra_hot;
    }

    public function drinkType(): DrinkType
    {
        return new DrinkType($this->drink_type);
    }

    public function price(): Price
    {
        return new Price($this->price);
    }

    public function sugar(): SugarQuantity
    {
        return new SugarQuantity($this->sugar);
    }

    public function extraHot(): bool
    {
        return $this->extra_hot ?? false;
    }
}