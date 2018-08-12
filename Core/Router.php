<?php

namespace Core;


class Router
{

    /**
     * @var array $routes
     */
	protected $routes = [];

    /**
     * @var array $params
     */
    protected $params = [];

    /**
     * @var $controller
     */
    private  $controller;




    /**
     * add a route to the routing table
     * @param $route
     * @param array $params
     */
	public function add($route, $params = [])
	{
	    // convert the route to a regular expression: escape forward slashes
	    $route = preg_replace('/\//', '\\/', $route);

	    // convert variables e.g {controller}
	    $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // convert variables with custom regular {id:\d}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

	    //add start and end delimiters, and case insensitive flag
        $route =  '/^' . $route . '$/i';

        $this->routes[$route] = $params;
	}


    /**
     * @return array
     */
	public function getRoutes() : array
    {
        return  $this->routes;
    }

    /**
     * @return mixed
     */
    public function getControllerName(){
	    return  str_replace('App\Controllers\\' , '',$this->controller);
    }

    /**
     * ищем соотвествие в таблице маршрутов
     * @param $url
     * @return bool
     */
    public function match($url)
    {

        foreach ($this -> routes as $route => $params) {

            if (preg_match($route, $url, $matches)) {

                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Get the currently matched parameters
     * @return array
     */
    public function getParams():array
    {
        return $this->params;
    }


    /**
     *
     * @param $url
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $this->controller = $this->params['controller'];
            $this->controller = $this->convertToStudlyCaps($this->controller);
//            $this->controller = "App\Controllers\\$this->controller";
            $this->controller = $this->getNamespace() . $this->controller;
            if (class_exists($this->controller)) {
                $controller_object = new $this->controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo "Method $action (in controller $this->controller) not found";
                }
            } else {
                echo "Controller class $this->controller not found";
            }
        }

            else
            {
                echo 'no route matched';
            }
    }




    /**
     * учит работать со строкой формата localhost/posts/index?page=1 || posts/index&page=1 || posts/index
     * @param $url
     * @return string
     */
    protected function removeQueryStringVariables($url): string
    {
        if ($url !='')
        {
            //разбиваем строку на подстроки
            $parts = explode('&', $url ,2);

            if (strpos($parts[0], '=') === false)
            {
                $url = $parts[0];
            } else $url = '';

        }
        return $url;
    }

    /**
     * @param $string
     * @return mixed
     */
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('',' ', $string)));
    }

    /**
     * @param $string
     * @return string
     */
    protected function convertToCamelCase($string): string
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }


    /**
     * @return string
     */
    protected function getNamespace():string
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace' , $this->params))
        {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;

    }




}
























?>