<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string trans(?string $text, ?string $locale = null)
 */
class GoogleTranslate extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'GoogleTranslate';
    }
}
