<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.08.2018
 * Time: 1:01
 */

namespace Core;


trait TSingletone{

    private static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}