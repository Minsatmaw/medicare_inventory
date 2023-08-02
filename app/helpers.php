<?php

use App\Models\GeneralSetting;



if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $generalsettings = GeneralSetting::first();
        return $generalsettings ? $generalsettings->{$key} : $default;
    }
}
