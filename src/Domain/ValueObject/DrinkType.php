<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\ValueObject;

use GetWith\CoffeeMachine\Domain\Exception\InvalidDrinkTypeException;

final class DrinkType
{
    public const COFFEE = 'coffee';
    public const TEA = 'tea';
    public const CHOCOLATE = 'chocolate';

    private const TYPES = [
        self::COFFEE,
        self::TEA,
        self::CHOCOLATE,
    ];

    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->assertValidType($value);
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    private function assertValidType(string $value)
    {
        if(!in_array($value, self::TYPES)) {
            throw new InvalidDrinkTypeException();
        }
    }
}