<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.08.2018
 * Time: 22:34
 */

namespace App\Controllers;


use App\Models\AppModel;
use Core\Controller;

class AppController extends  Controller
{

    public function __construct($route_params)
    {
        parent::__construct($route_params);

        new AppModel();
    }

}