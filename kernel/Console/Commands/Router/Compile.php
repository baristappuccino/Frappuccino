<?php

namespace Kernel\Console\Commands\Router;

use Kernel\Console\Command;
use Kernel\Router\RouteCompiler;
use Kernel\Util\Stopwatch;

class Compile extends Command
{

    private const ROUTE_LOCATION = __DIR__ . '/../../../../routes_c.json';

    /**
     * @inheritDoc
     */
    public function run(array $args): void
    {
        $stopwatch = new Stopwatch();

        $routeCompiler = new RouteCompiler();
        $routes = $routeCompiler->getRoutes();
        $routesAsJson = json_encode($routes, JSON_PRETTY_PRINT);

        file_put_contents(self::ROUTE_LOCATION, $routesAsJson, LOCK_EX);

        $this->success("Renewed route declarations in " . $stopwatch->stopAsMilli() . 'ms');
    }

    /**
     * @inheritDoc
     */
    public static function invoke(array $args): void
    {
        (new self())->run($args);
    }
}
