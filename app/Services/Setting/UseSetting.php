<?php

namespace App\Services\Setting;

use App\Setting;

class UseSetting 
{
    
    private $setting;

    function __construct()
    {
        Setting::get()->map(function($record) {
            return $this->setting = $record;
        });
    }

    public function title()
    {
        return $this->setting->title;
    }

    public function description()
    {
        return $this->setting->description;
    }

    public function sort()
    {
        return $this->setting->sort_product;
    }
}
