<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;
use Core\View;

/**
 * Posts controller
 *
 * PHP version 7.4
 */
class Posts extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(): void
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction(): void
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    /**
     * Show the edit page
     *
     * @return void
     */
    public function editAction(): void
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
