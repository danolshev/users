<?php

namespace App\Entities;

interface Journalable
{
    public function getJournalableFields(): array;

    public function getOwnerType(): string;
}
