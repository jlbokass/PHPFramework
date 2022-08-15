<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Token;
use Core\Controller;
use Core\View;

/**
 * Password controller
 *
 * PHP 7.7
 */
class Password extends Controller
{
    /**
     * Show the forgotten password page
     *
     * @return void
     */
    public function forgotAction(): void
    {
        View::renderTemplate('Password/forgot.html');
    }

    /**
     * Send the password reset link to the supplied email
     *
     * @return void
     */
    public function requestResetAction()
    {
        User::sendPasswordReset($_POST['inputEmail']);

        View::renderTemplate('Password/reset_requested.html');
    }

    /**
     * Show the reset password form
     *
     * @return void
     */
    public function resetAction()
    {
        $token = $this->route_params['token'];

        $user = $this->getUserOrExit($token);

        View::renderTemplate('Password/reset.html', [
            'token' => $token
        ]);
    }

    /**
     * Reset the user's password
     *
     * @return void
     */
    public function resetPasswordAction()
    {
        $token = $_POST['token'];

        $user = $this->getUserOrExit($token);

        if ($user->resetPassword($_POST['password'])) {

            View::renderTemplate('Password/reset_success.html.twig');

        } else {

            View::renderTemplate('Password/reset.html', [
                'token' => $token,
                'user' => $user
            ]);
        }
    }

    /**
     * Find the user model associated with the password reset token, or end the request with message
     *
     * @param string $token Password reset token sent to user
     *
     * @return mixed User object if found and the token hasn't expired, null otherwise
     */
    protected function getUserOrExit(string $token)
    {
        $user = User::findByPasswordReset($token);

        if ($user) {

           return $user;

        } else {

            View::renderTemplate('Password/token_expired.html');
            exit();
        }
    }
}