<?php

namespace Kernel\Console;

use App\Commands\CommandRegistry;

class Execution
{

    /**
     * @var array|null
     */
    private $matchers = null;

    /**
     * Execution constructor.
     * @param $args
     */
    public function __construct($args)
    {
        $args ??= [];

        $this->matchers = $this->getMatchers();
        array_shift($args);
        $this->match($args);
    }

    /**
     * Match set of arguments to command
     * @param $args
     */
    private function match(array $args) : void
    {
        foreach($this->matchers as $matcherKey => $matcherVal)
        {
            $matcher = explode("|", $matcherKey);
            $count = 0;
            $match = true;
            foreach($matcher as $matchPiece)
            {
                if(!(array_key_exists($count, $args) && ($args[$count] === $matchPiece || $matchPiece === "{var}")))
                {
                    $match = false;
                }
                $count++;
            }
            if($match)
            {
                $this->invoke($matcherVal, $args);
                break;
            } else {
                echo "Error: This is not a recognized command!";
            }
        }
    }

    /**
     * Invoke new command
     *
     * @param $class
     * @param $args
     */
    private function invoke(string $class, array $args) : void
    {
        ($class)::invoke($args);
    }

    /**
     * Get all the appropriate matchers
     * @return array
     */
    private function getMatchers() : array
    {
        return $this->matchers ?? array_merge(KernelCommandRegistry::$registry, CommandRegistry::$registry);
    }

}
