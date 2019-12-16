<?php

namespace Kernel\Console;

use Kernel\Console\Commands\Brew\Provider;

class KernelCommandRegistry {

    public static $registry = [
        "brew|provider_beta|{var}" => Provider::class,
        "brew|provider|{var}" => Provider::class
    ];

}