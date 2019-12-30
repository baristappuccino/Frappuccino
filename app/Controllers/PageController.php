<?php

namespace App\Controllers;

/**
 * Class PageController
 * @package App\Controllers
 * @Prefix page
 * @Middleware Authentication
 */
class PageController
{

    /**
     * @Route GET /[i:id]/
     */
    public function index()
    {
    }

    /**
     * @Route POST /info
     * @Middleware !CSRF Administrator
     */
    public function info()
    {
    }
}
