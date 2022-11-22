<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entities\Journalable;

class BaseRepository
{
    protected function persist($entity): void
    {
        if ($entity instanceof Journalable) {
            $this->addJournalRecord($entity);
        }
    }

    protected function addJournalRecord($entity): void
    {
        $fields = $entity->getJournalableFields();
        $journalableFields = array_filter(
            array_keys($entity->getData()),
            fn ($item) => in_array($item, $fields, true)
        );

        //save $journalableFields, $entity->getId(), $entity->getOwnerType()
    }
}
