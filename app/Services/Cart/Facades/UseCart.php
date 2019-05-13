<?php 

namespace App\Services\Cart\Facades;

use Illuminate\Support\Facades\Facade;

class UseCart extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'UseCart';
    }
}