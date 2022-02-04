<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Tests\Unit\DrinkMachine\Domain\ValueObject;

use GetWith\CoffeeMachine\DrinkMachine\Domain\Exception\InvalidSugarQuantityException;
use GetWith\CoffeeMachine\DrinkMachine\Domain\ValueObject\Sugar;
use PHPUnit\Framework\TestCase;

final class SugarTest extends TestCase
{
    public function testAssertShouldReturnValidObject(): void
    {
        $money = new Sugar(1);

        $this->assertInstanceOf(Sugar::class, $money);
    }

    public function testAssertShouldReturnInvalidSugarQuantityExceptionIfLessThanMin(): void
    {
        $this->expectException(InvalidSugarQuantityException::class);
        $money = new Sugar(Sugar::MIN - 1);

    }

    public function testAssertShouldReturnInvalidSugarQuantityExceptionIfGreaterThanMax(): void
    {
        $this->expectException(InvalidSugarQuantityException::class);
        $money = new Sugar(Sugar::MAX + 1);

    }
}