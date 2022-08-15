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

            $user->sendActivationEmail();

            $this->redirect('/PHPFramework/signup/success');

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


    /**
     * Activate a new account
     *
     * @return void
     */
    public function activateAction(): void
    {
        User::activate($this->route_params['token']);

        $this->redirect('/PHPFramework/signup/activated');
    }

    /**
     * Show the activation success page
     *
     * @return void
     */
    public function activatedAction()
    {
        View::renderTemplate('Signup/activated.html');
    }
}