<?php

namespace Kernel\Console\Commands\Brew;

use Kernel\Console\Command;

class Provider extends Command {

    /**
     * @inheritDoc
     */
    public function run(array $args) : void
    {
        parent::msg("Made provider " .$args[2]);
    }

    /**
     * @inheritDoc
     */
    public static function invoke(array $args) : void
    {
        (new self)->run($args);
    }
}