<?php

namespace App\Services;

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
    public const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    public const DB_NAME = 'php_mvc';

    /**
     * Database user
     * @var string
     */
    public const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    public const DB_PASSWORD = 'dabok1977';

    /**
     * Show or hide error message on screen
     */
    public const SHOW_ERRORS = true;

    /**
     * Secret key for hashing
     * url : https://randomkeygen.com/
     * @var bool
     */
    public const SECRET_KEY = '0naflXhOBjLzH6AsScRpONKSUn2j8WUx';

    /**
     * Email host
     * @var string
     */
    public const EMAIL_HOST = 'mail.2-for-you.fr';

    /**
     * Email username
     * @var string
     */
    public const EMAIL_USERNAME = 'leakmanager@2-for-you.fr';

    /**
     * Email password
     * @var string
     */
    public const EMAIL_PASSWORD = '?t]vfyRFV_N3';
}
