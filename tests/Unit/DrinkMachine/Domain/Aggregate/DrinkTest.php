<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Tests\Unit\DrinkMachine\Domain\Aggregate;

use GetWith\CoffeeMachine\DrinkMachine\Domain\Aggregate\Drink;
use GetWith\CoffeeMachine\DrinkMachine\Domain\DrinkType;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\InsufficientMoneyException;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Factory\DrinkTypeFactory;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Money;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Sugar;
use PHPUnit\Framework\TestCase;

final class DrinkTest extends TestCase
{
    /** @var DrinkType */
    private $coffe;

    protected function setUp(): void
    {
        $this->coffe = DrinkTypeFactory::build('coffee');
    }

    public function testShouldReturnValidObject(): void
    {
        $drink = new Drink(
            $this->coffe,
            new Money($this->coffe->price()),
            new Sugar(1),
            false
        );

        $this->assertInstanceOf(Drink::class, $drink);
    }

    public function assertInsufficientMoneyExceptionShouldBeThrown(): void
    {
        $this->expectException(InsufficientMoneyException::class);

        $drink = new Drink(
            $this->coffe ,
            new Money($this->coffe->price() - 0.000001),
            new Sugar(1),
            false
        );
    }
}