<?php

declare(strict_types=1);

namespace App\Modules\Journal;

class EventRecord
{
    public function __construct(private string $eventMessage, private array $eventPayload)
    {
    }

    public function getEventMessage(): string
    {
        return $this->eventMessage;
    }

    public function getEventPayload(): array
    {
        return $this->eventPayload;
    }
}
