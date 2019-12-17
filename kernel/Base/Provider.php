<?php

namespace Kernel\Base;

class Provider {

    static $boot = false;

    public static function boot()
    {
        if(!self::$boot)
        {
            self::$boot = true;
            (new static)->register();
        }
    }

}