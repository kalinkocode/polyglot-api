<?php

declare(strict_types=1);

namespace Kalinkocode\PolyglotApi\Facades;

use Illuminate\Support\Facades\Facade;

class PolyglotApi extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'polyglot-api';
    }
}
