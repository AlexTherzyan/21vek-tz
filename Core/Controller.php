<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 30.07.2018
 * Time: 14:36
 */

namespace Core;

/*
 * Base controller
 */
abstract class Controller
{

    /**
     * @var array
     */
    protected $route_params = [];

    /**
     * Controller constructor.
     * @param $route_params
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    /**
     * @param $name
     * @param $args
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method))
        {
            if ($this->before() !== false)
            {
                //Вызываем callback-функцию с массивом параметров
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else
            echo "Method $method not found in controller" . get_class($this);
    }

    protected function before()
    {

    }


    protected function after()
    {

    }



}