<?php

namespace App\Controllers;

use Core\View;

/**
 * Items class
 *
 * PHP 7.4
 *
 */
class Items extends Authenticated
{
    /**
     * Page to view items
     *
     * @return void
     */
    public function indexAction(): void
    {
        View::renderTemplate('Items/index.html');
    }
}