<?php

namespace App\Modules\Journal\Handlers;

use App\Modules\Journal\EventRecord;

class StoreHandler implements HandlerInterface
{
    public function handle(EventRecord $record): bool
    {
        //save into database $record->getEventPayload();

        return true;
    }
}
