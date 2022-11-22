<?php

namespace App\Modules\Journal\Handlers;

use App\Modules\Journal\EventRecord;

interface HandlerInterface
{
    public function handle(EventRecord $record): bool;
}
