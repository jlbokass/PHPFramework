<?php

namespace Core;

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
        static $twig = null;

        if ($twig === null) {
            $loader = new FilesystemLoader('../App/Views');
            $twig = new Environment($loader);
        }

        echo $twig->render($template, $args);
    }
}
