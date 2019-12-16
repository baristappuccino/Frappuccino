<?php

namespace Kernel\Console;

abstract class Command {

    /**
     * Run te command
     * @param $args
     * @return mixed
     */
    public abstract function run($args);

    /**
     * Invoke the command.
     * @param $args
     */
    public abstract static function invoke($args);

    /**
     * Print a message to the console
     * @param $message
     */
    public function msg($message)
    {
        echo $message .PHP_EOL;
    }
}