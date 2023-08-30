<?php

use App\Models\GeneralSetting;



if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $settings = \App\Models\GeneralSetting::first();
        return $settings ? $settings->{$key} : $default;
    }
}
