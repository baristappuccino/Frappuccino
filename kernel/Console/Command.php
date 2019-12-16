<?php

namespace Kernel\Console;

abstract class Command {

    /**
     * Run te command
     * @param $args
     * @return mixed
     */
    public abstract function run(array $args) : void;

    /**
     * Invoke the command.
     * @param $args
     */
    public abstract static function invoke(array $args) : void;

    /**
     * Print a message to the console
     * @param $message
     */
    public function msg(string $message) : void
    {
        echo $message .PHP_EOL;
    }
}