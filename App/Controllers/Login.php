<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Auth;
use App\Services\Flash;
use Core\Controller;
use Core\View;


class Login extends Controller
{
    /**
     * Page to view the login form
     *
     * @return void
     */
    public function newAction(): void
    {
        View::renderTemplate('Login/new.html');
    }

    /**
     * Log in the user
     *
     * @return void
     */
    public function createAction(): void
    {
        $user = User::authenticate($_POST['email'], $_POST['password']);

        $remember_me = isset($_POST['remember_me']);

        if ($user) {

            Auth::login($user, $remember_me);

            Flash::addMessage('Login successful');

            $this->redirect(Auth::getReturnToPage());

        } else {

            Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);

            View::renderTemplate('Login/new.html', [
                'email' => $_POST['email'],
                'remember_me' => $remember_me
            ]);
        }
    }

    /**
     * Log out the user
     *
     * @return void
     */
    public function destroyAction(): void
    {
        Auth::logout();

        $this->redirect('/PHPFramework/login/show-logout-message');
    }

    /**
     * Show "logout" flash message and redirect to the homepage.Necessary to use the flash messages
     * as they use the session and at the end of the logout method (destroyAction) the session is destroyed
     *
     * @return void
     */
    public function showLogoutMessageAction(): void
    {
        Flash::addMessage('Logout successful');

        $this->redirect('/PHPFramework/');
    }
}