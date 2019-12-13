<?php

namespace Kernel\Console;

use Kernel\Console\Commands\Brew\Provider;

class KernelCommandRegistry {

    static $registry = [
        ["brew", "provider", "{var}"] => Provider::class
    ];

}