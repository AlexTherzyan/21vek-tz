<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 31.07.2018
 * Time: 13:44
 */

namespace Core;


abstract class Model
{


    public function __construct(){
        Db::instance();

    }




}