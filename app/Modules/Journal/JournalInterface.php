<?php

declare(strict_types=1);

namespace App\Modules\Journal;

interface JournalInterface
{
    public function addEvent(string $eventMessage, array $eventPayload = []): bool;
}
