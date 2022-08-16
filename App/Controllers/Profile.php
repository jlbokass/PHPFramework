<?php

namespace App\Controllers;

use App\Services\Auth;
use App\Services\Flash;
use Core\View;

/**
 * Profile controller
 *
 * PHP 7.4
 */
class Profile extends Authenticated
{
    /**
     * Before filter - called before each action method
     *
     * @return void
     */
    public function before()
    {
        parent::before();
        $this->user = Auth::getUser();
    }

    /**
     * Show the profile
     *
     * @return void
     */
    public function showAction()
    {
        View::renderTemplate('Profile/show.html.twig', [
            'user' => $this->user,
        ]);
    }

    /**
     * @return void
     */
    public function editAction()
    {
        View::renderTemplate('Profile/edit.html.twig', [
            'user' => $this->user,
        ]);
    }

    /**
     * Update the profile
     *
     * @return void
     */
    public function updateAction()
    {
        if ($this->user->updateProfile($_POST)) {

            Flash::addMessage('Changes saved');

            $this->redirect('/PHPFramework/profile/show');

        } else {

            View::renderTemplate('Profile/edit.html.twig', [
                'user' => $this->user
            ]);

        }
    }
}