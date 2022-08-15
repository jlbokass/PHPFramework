<?php

namespace App\Controllers;

use Core\Controller;

abstract class Authenticated extends Controller
{
    /**
     * Require the user to be authenticated before giving access to all methods in controller
     * @return void
     */
    public function before()
    {
        $this->requireLogin();
    }
}