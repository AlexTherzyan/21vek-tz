<?php

 require "../config/autoload.php";

use Core\Router;

function debug($arr){
    echo '<pre>' . print_r($arr,true) . '</pre>';
}


/*
 * Twig (laravel template)
 */
require_once  '../vendor/autoload.php';
/*
 *
 */






$router = new Router();

// rule routes
$router -> add('',['controller' => 'Journal', 'action' => 'index']);
$router -> add('{controller}/{action}');
$router -> add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router -> add('{controller}/{id:\d+}/{action}');


$router -> dispatch( $_SERVER['QUERY_STRING']);

//if ($router->match($url))
//    debug($router->getRoutes());
//else echo "No router is found " . $url;
?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>





