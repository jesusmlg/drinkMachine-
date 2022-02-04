<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Tests\Unit\DrinkMachine\Domain\ValueObject;

use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\MoneyCantBeZeroOrLessException;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Money;
use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
    public function testAssertShouldReturnValidObject(): void
    {
        $money = new Money(1);

        $this->assertInstanceOf(Money::class, $money);
    }

    public function testAssertShouldReturnCantBeZeroOrLessException(): void
    {
        $this->expectException(MoneyCantBeZeroOrLessException::class);
        $money = new Money(-1);

    }
}