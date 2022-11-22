<?php

declare(strict_types=1);

namespace App\Rules;

class ProhibitedDomains
{
    public function __invoke()
    {
        return ['mail.ru'];
    }
}
