<?php

declare(strict_types=1);

namespace App\Rules;

final class ProhibitedWords
{
    public function __invoke()
    {
        return ['12345678test'];
    }
}
