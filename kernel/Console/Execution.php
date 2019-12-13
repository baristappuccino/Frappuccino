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

        echo 'Oh no! You forgot to put some beans in the machine. Next time, try it with arguments';
exit;
        $args ??= [];

        $matchers = $this->getMatchers();
        $this->match(reset(array_pop(array_reverse($args))));
    }

    private function match($args)
    {
        foreach($args as $givenArgument)
        {

        }
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
