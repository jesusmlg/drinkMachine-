<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Tests\Unit\DrinkMachine\Domain\Factory;

use GetWith\CoffeeMachine\DrinkMachine\Domain\CoffeeType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\InvalidDrinkTypeException;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Factory\DrinkTypeFactory;
use PHPUnit\Framework\TestCase;

final class DrinkTypeFactoryTest extends TestCase
{
    /** @var DrinkTypeFactory */
    private $sut;

    protected function setUp(): void
    {
        $this->sut = new DrinkTypeFactory();
    }

    public function testShouldReturnValidDrinkTypeObject(): void
    {
        $object = $this->sut::build(CoffeeType::NAME);

        $this->assertInstanceOf(CoffeeType::class, $object);
    }

    public function testShouldReturnInvalidTypeExceptionIfNoValidType(): void
    {
        $this->expectException(InvalidDrinkTypeException::class);

        $this->sut::build('moka');
    }
}