<?php

namespace Facades\App\Services\Setting;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\Setting\UseSetting
 */
class UseSetting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Services\Setting\UseSetting';
    }
}
