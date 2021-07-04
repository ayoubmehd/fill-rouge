<?php

namespace App\Classes;


use Facebook\PersistentData\PersistentDataInterface;

class FacebookSession implements PersistentDataInterface
{
    public function get($key)
    {
        return session()->get($key);
    }

    public function set($key, $value)
    {
        session()->put($key, $value);
    }
}
