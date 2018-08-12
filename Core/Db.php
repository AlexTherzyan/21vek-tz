<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.08.2018
 * Time: 1:04
 */

namespace Core;




class Db{

    use TSingletone;

    protected function __construct(){

        class_alias('\RedBeanPHP\R','\R');

       \R::setup('mysql:host=localhost;dbname=21vek-tz;charset=utf8', 'root', '');
        if( !\R::testConnection() ){
            echo "нет Соединения с бд";
            die;
        }


    }

}