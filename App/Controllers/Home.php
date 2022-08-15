<?php

namespace App\Controllers;

use App\Auth;
use App\Services\Mail;
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
     * Show the index page
     *
     * @return void
     */
    public function indexAction(): void
    {
        // Mail::sent('naullereigeicroi-6728@yopmail.com', 'test 2', 'This is a test 2','<h1>This is a test 2</h1><p>Ah Ah Ha</p>');
        View::renderTemplate('Home/index.html.twig');
    }
}