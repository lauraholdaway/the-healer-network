<?php

use App\Models\Setting;

function setting($key)
{
    return Setting::where('key', $key)->value('value');
}

function set_setting($key, $value)
{
    Setting::updateOrCreate(
        ['key' => $key],
        ['value' => $value]
    );
}
