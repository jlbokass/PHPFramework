<?php

namespace App;

/**
 * class Flash
 *
 * PHP 7.4
 */
class Flash
{
    /**
     * Success message type
     *
     *@var string
     */
    const SUCCESS = 'success';

    /**
     * Information message type
     *
     *@var string
     */
    const INFO = 'info';

    /**
     * Warning message type
     *
     *@var string
     */
    const WARNING = 'warning';

    /**
     * Add message
     *
     * @param string $message The message content
     * @param string $type The message type
     *
     * @return void
     */
    public static function addMessage(string $message, string $type = 'success'): void
    {
        if (! isset($_SESSION['flash_notifications'])) {
            $_SESSION['flash_notifications'] = [];
        }

        // Append the message to the array
        $_SESSION['flash_notifications'][] = [
            'body' => $message,
            'type' => $type
        ];
    }

    /**
     * Get all messages
     *
     * @return mixed|void An array with all the messages or null if none set
     */
    public static function getMessages()
    {
        if (isset($_SESSION['flash_notifications'])) {

            $message = $_SESSION['flash_notifications'];
            unset($_SESSION['flash_notifications']);

            return $message;
        }
    }
}