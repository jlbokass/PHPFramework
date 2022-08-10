<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

/**
 * Home controller
 *
 * PHP 7.4
 */
class Home extends Controller
{
    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        // echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(): void
    {
        View::renderTemplate('Home/index.php', [
            'name' => 'John',
            'colours' => ['red', 'green', 'blue']
        ]);
    }
}