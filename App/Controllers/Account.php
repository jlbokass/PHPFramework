<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;

/**
 * Account controller
 *
 * PHP 7.4
 */

class Account extends Controller
{
    /**
     * Validate if email is available with ajax request for new signup
     *
     * @return void
     */
    public function validateEmailAction(): void
    {
        $is_valid = ! User::emailExists($_GET['email'], $_GET['ignore_id'] ?? null);

        header('Content-Type: application/json');
        echo json_encode($is_valid);
    }
}