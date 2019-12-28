<?php

namespace Kernel\Console;

use Kernel\Console\Commands\Brew\Provider;
use Kernel\Console\Commands\Serve;
use Kernel\Console\Commands\Serveroot;

class KernelCommandRegistry
{

    public static $registry = [
        // brew provider
        "brew|provider|{var}" => Provider::class,

        // serve-root
        "serve-root" => Serveroot::class,
        "serve-root|{var}" => Serveroot::class,

        // serve
        "serve" => Serve::class,
        "serve|{var}" => Serve::class,
    ];
}
