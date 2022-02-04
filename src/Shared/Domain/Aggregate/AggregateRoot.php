<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Shared\Domain\Aggregate;

use GetWith\CoffeeMachine\Shared\Domain\Event\DomainEvent;

class AggregateRoot
{
    private $domain_events = [];

    final public function pullDomainEvents(): array
    {
        $domain_events       = $this->domain_events;
        $this->domain_events = [];

        return $domain_events;
    }

    final protected function record(DomainEvent $domainEvent): void
    {
        $this->domain_events[] = $domainEvent;
    }
}