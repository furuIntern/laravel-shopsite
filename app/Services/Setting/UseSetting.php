<?php

namespace App\Services\Setting;

use App\Setting;

class UseSetting 
{
    
    private $setting;

    function __construct()
    {
        foreach (Setting::get() as $value) {
            $this->setting = $value;
        }
    }

    public function title()
    {
        return $this->setting->title;
    }

    public function description()
    {
        return $this->setting->description;
    }

}
