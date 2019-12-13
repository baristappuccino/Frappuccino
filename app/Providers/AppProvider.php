<?php
namespace App\Providers;

class AppProvider {

    private function register()
    {
        // Register your data
    }

    static $boot = false;

    public static function boot()
    {
        if(!self::$boot)
        {
            self::$boot = true;
            (new self())->register();
        }
    }

}