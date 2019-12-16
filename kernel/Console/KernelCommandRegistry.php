<?php

namespace Kernel\Console;

use Kernel\Console\Commands\Brew\Provider;

class KernelCommandRegistry {

    public static $registry = [
        "brew|provider|{var}" => Provider::class
    ];

}