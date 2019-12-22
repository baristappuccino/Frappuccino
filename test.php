<?php

require 'boot.php';

new \Kernel\Router\RouteCompiler();

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