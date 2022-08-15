<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.4
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'php_mvc';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'dabok1977';

    /**
     * Show or hide error message on screen
     */
    const SHOW_ERRORS = true;

    /**
     * Secret key for hashing
     * url : https://randomkeygen.com/
     * @var boolean
     */
    const SECRET_KEY = '0naflXhOBjLzH6AsScRpONKSUn2j8WUx';

    /**
     * Email host
     * @var string
     */
    const EMAIL_HOST = 'mail.2-for-you.fr';

    /**
     * Email username
     * @var string
     */
    const EMAIL_USERNAME = 'leakmanager@2-for-you.fr';

    /**
     * Email password
     * @var string
     */
    const EMAIL_PASSWORD = '?t]vfyRFV_N3';
}
