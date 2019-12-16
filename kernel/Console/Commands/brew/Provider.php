<?php

namespace Kernel\Console\Commands\Brew;

use Kernel\Console\Command;

class Provider extends Command {

    /**
     * @inheritDoc
     */
    public function run($args)
    {
        parent::msg("Made provider " .$args[2]);
    }

    /**
     * @inheritDoc
     */
    public static function invoke($args)
    {
        (new self)->run($args);
    }
}