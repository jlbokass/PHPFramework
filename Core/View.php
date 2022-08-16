<?php

namespace Core;

use App\Services\Auth;
use App\Services\Flash;
use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * View
 *
 * PHP version 5.4
 */
class View
{

    /**
     * Render a view file
     *
     * @param string $view The view file
     * @param array $args
     *
     * @return void
     *
     * @throws Exception
     */
    public static function render(string $view, array $args = []): void
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            // echo "$file not found";
            throw new Exception("$file not found");
        }
    }

    /**
     * Render a view template using Twig : https://twig.symfony.com/doc/3.x/api.html
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate(string $template, array $args = []): void
    {
        echo static::getTemplate($template, $args);
    }

    /**
     * Render a view template using Twig : https://twig.symfony.com/doc/3.x/api.html
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return string
     */
    public static function getTemplate(string $template, array $args = []): string
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new FilesystemLoader('../App/Views');
            $twig = new Environment($loader);
            $twig->addGlobal('session', $_SESSION);
            $twig->addGlobal('current_user', Auth::getUser());
            $twig->addGlobal('flash_messages', Flash::getMessages());
        }

        return $twig->render($template, $args);
    }
}
