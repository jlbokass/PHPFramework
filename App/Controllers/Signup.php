<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;

/**
 * Signup controller
 *
 * PHP 7.4
 */

class Signup extends Controller
{
    /**
     * Show the signup page
     *
     * @return void
     */
    public function newAction(): void
    {
        View::renderTemplate('Signup/new.html');
    }

    /**
     * Sign up a new user
     *
     * @return void
     */
    public function createAction(): void
    {
        $user = new User($_POST);

        if ($user->save()) {

            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/PHPFramework/signup/success', true, 303);
            exit;

        } else {

            View::renderTemplate('Signup/new.html', [
                'user' => $user
            ]);

        }
    }

    /**
     * Show the signup success page
     *
     * @return void
     */
    public function successAction(): void
    {
        View::renderTemplate('Signup/success.html');
    }
}