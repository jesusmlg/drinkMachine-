<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Shared\Domain\Event;

use DateTimeImmutable;

abstract class DomainEvent
{
    /** @var string  */
    private $event_id;
    /** @var int  */
    private $ocurred_on;
    /** @var string */
    private $aggregate_id;

    public function __construct(string $aggregate_id)
    {
        $this->event_id    = uniqid('', true);
        $this->ocurred_on = (new DateTimeImmutable())->getTimestamp();
        $this->aggregate_id = $aggregate_id;
    }

    abstract public static function eventName(): string;
    abstract public function toPrimitives(): array;

    public function aggregateId(): string
    {
        return $this->aggregate_id;
    }

    public function eventId(): string
    {
        return $this->event_id;
    }

    public function ocurredOn(): int
    {
        return $this->ocurred_on;
    }
}