<?php

namespace Kernel\Console;

abstract class Command
{

    /**
     * Run te command
     * @param $args
     * @return mixed
     */
    abstract public function run(array $args): void;

    /**
     * Invoke the command.
     * @param $args
     */
    abstract public static function invoke(array $args): void;

    /**
     * Print a message to the console
     * @param $message
     */
    public function msg(string $message): void
    {
        echo $message . PHP_EOL;
    }

    /**
     * Print an error to the console
     * @param string $message
     */
    public function error(string $message): void
    {
        echo 'Error: ' . $message . PHP_EOL;
    }

    public function warn(string $message): void
    {
        echo 'Warning: ' . $message . PHP_EOL;
    }
}