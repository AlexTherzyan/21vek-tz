<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.07.2018
 * Time: 23:24
 */

namespace Core;


class View
{

    /**
     * rendering template
     * @param $view
     * @param array $content
     * @return string
     */
    public static function render($view, $content = [])
    {
        $file = "../App/Views/$view";


        if (is_readable($file)) {
        //ob_start();
            extract($content);
            require_once $file;
        //return ob_get_clean();
        } else return "файл не найден";
    }


    /**
     * render template using twig
     * @param $template
     * @param array $content
     */
    public  static function renderTemplate($template, $content = [])
    {
        static $twig = null;

        if ($twig === null)
        {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }

        try {
            echo $twig->render($template, $content);
        } catch (\Twig_Error_Loader $e) {
        } catch (\Twig_Error_Runtime $e) {
        } catch (\Twig_Error_Syntax $e) {
        }
    }



}

























