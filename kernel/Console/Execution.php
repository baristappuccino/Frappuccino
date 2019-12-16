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

    private function match($args)
    {
        foreach($this->matchers as $matcherkey => $matcherval)
        {
            $matcher = explode("|", $matcherkey);
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
                $this->invoke($matcherval, $args);
                continue;
            }
        }
    }

    private function invoke($class, $args)
    {

    }

    /**
     * Get all the appropriate matchers
     * @return array
     */
    private function getMatchers()
    {
        return $this->matchers ?? array_merge(KernelCommandRegistry::$registry, CommandRegistry::$registry);
    }

}
