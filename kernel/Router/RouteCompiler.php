<?php

namespace Kernel\Router;

use Kernel\Exceptions\RouterException;
use Kernel\Util\StringUtil;

class RouteCompiler
{

    private array $filesToScan = [];
    private array $routes = [];

    public const BASE_DIR = __DIR__ . "/../../App/Controllers/";

    /**
     * RouteCompiler constructor.
     */
    public function __construct()
    {
        $this->filesToScan = $this->getEligibleFiles();
        foreach ($this->filesToScan as $fileToScan) {
            $this->runTokenizer($fileToScan);
        }

        var_dump($this->routes);
    }

    /**
     * Run the tokenizer and store the routes
     * @param string $fileToScan
     * @throws RouterException
     */
    private function runTokenizer(string $fileToScan): void
    {
        $path = realpath(self::BASE_DIR . '/' . $fileToScan);
        $file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileToScan);;
        $routes = (new RoutesTokenizer(file_get_contents($path)))->getResults();
        foreach ($routes as $route) {
            $id = strtolower($route["http"]["method"] . ':' .$route["http"]["route"]);

            if (isset($this->routes[$id])) {
                $sFile = $this->routes[$id]["file"];
                $desc = $route["http"]["method"] . ' ' . $route["http"]["route"] . ' in ' . $file . ' and ' . $sFile;
                throw new RouterException("Duplicate route declaration (" . $desc . ')');
            } else {
                $route["file"] = $file;
                $this->routes[$id] = $route;
            }
        }
    }

    /**
     * Get all the eligible files
     * @return array
     */
    private function getEligibleFiles(): array
    {
        $files = scandir(self::BASE_DIR);
        $eligible = [];
        foreach ($files as $file) {
            if (StringUtil::endsWith($file, ".php")) {
                $eligible[] = $file;
            }
        }
        return $eligible;
    }

}