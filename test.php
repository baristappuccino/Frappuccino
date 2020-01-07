<?php

require 'boot.php';

$stopwatch = new \Kernel\Util\Stopwatch();
new \Kernel\Router\RouteCompiler();
echo $stopwatch->stopAsMicro();

//$var = <<<'EOT'
//<?php
//
//namespace App\Controllers;
//
//class Controller {
//
//    /*
//    Test
//    */
//    /**
//    @Route GET /
//    */
//    public function index()
//    {
//
//    }
//
//        /**
//    @Route POST /info
//    */
//    public function info()
//    {
//
//    }
//
//}
//EOT;
//
//
//new \Kernel\Router\RoutesTokenizer($var);