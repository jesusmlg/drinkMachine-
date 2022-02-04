<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Tests\Unit\DrinkMachine\Application;

use GetWith\CoffeeMachine\DrinkMachine\Application\GetDrinkMessageHandler;
use GetWith\CoffeeMachine\DrinkMachine\Application\Query\GetDrinkMessageQuery;
use GetWith\CoffeeMachine\DrinkMachine\Domain\Service\BuyMessageCreator;
use PHPUnit\Framework\TestCase;

final class GetDrinkMessageHandlerTest extends TestCase
{
    /** @var GetDrinkMessageHandlerTest */
    private $sut;
    /** @var BuyMessageCreator */
    private $mocked_buy_message_creator;

    protected function setUp(): void
    {
        $this->mocked_buy_message_creator = $this->createMock(BuyMessageCreator::class);
        $this->sut = new GetDrinkMessageHandler($this->mocked_buy_message_creator);
    }

    public function testShouldReturnValidText(): void
    {
        $this->mocked_buy_message_creator
            ->expects(self::once())
            ->method('message')
            ->willReturn('valid message');

        $query = new GetDrinkMessageQuery(
            'coffee',
            0.5,
            1,
            false
        );

        $response = $this->sut->__invoke($query);

        $this->assertEquals($response, 'valid message');
    }
}