<?php

namespace Kernel\Console\Commands\Router;

use Kernel\Console\Command;

class CompileWatch extends Command
{

    private string $checksum = "";
    public const BASE_DIR = __DIR__ . "/../../../../App/Controllers";

    /**
     * @inheritDoc
     */
    public function run(array $args): void
    {
        $this->warn("Do not run this command in production, as it periodically locks the routes_c.json file.");

        do {
            $checksum = $this->getDirectoryChecksum(self::BASE_DIR);
            if ($checksum !== $this->checksum) {
                $this->checksum = $checksum;
                $this->compile();
            }
        } while (sleep(1) === 0);
    }

    /**
     * Re-compile routes
     */
    private function compile(): void
    {
        Compile::invoke([]);
    }

    /**
     * Get md5 checksum from a directory
     * @param string $dir
     * @return string
     */
    public function getDirectoryChecksum(string $dir): string
    {
        $filemd5s = array();
        $d = dir($dir);

        while (false !== ($entry = $d->read())) {
            if ($entry !== '.' && $entry !== '..') {
                if (is_dir($dir . '/' . $entry)) {
                    $filemd5s[] = $this->getDirectoryChecksum($dir . '/' . $entry);
                } else {
                    $filemd5s[] = md5_file($dir . '/' . $entry);
                }
            }
        }
        $d->close();
        return md5(implode('', $filemd5s));
    }

    /**
     * @inheritDoc
     */
    public static function invoke(array $args): void
    {
        (new self())->run($args);
    }
}
