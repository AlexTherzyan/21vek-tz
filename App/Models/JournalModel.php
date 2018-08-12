<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10.08.2018
 * Time: 13:36
 */

namespace App\Models;




class JournalModel extends AppModel
{


    /**
     * Добавление пользователя в бд и обработка ошибок
     * @return mixed
     */
    public static function addUser()
    {


        if (isset($_POST['cancel'])) header('Location: /');

        if (isset($_POST['save'])) {


            $errors =  array();

            $firstname       = htmlspecialchars( $_POST['firstname']);
            $lastname        = htmlspecialchars( $_POST['lastname']);
            $date_of_birth   = htmlspecialchars( $_POST['date_of_birth']);
            $patronymic      = htmlspecialchars( $_POST['patronymic']);



            if(trim($lastname == '')){
                $errors[]= 'поле <em>Фамилия</em> не должно быть пустым';
            }
            if(preg_match('/[0-9]/',$lastname)){
                $errors[]= 'поле <em>Фамилия</em> не должно содержать цифры';
            }

            if(trim($firstname == '')){
                $errors[] = 'поле <em>Имя</em> не должно быть пустым';
            }
            if(preg_match('/[0-9]/',$firstname)){
                $errors[]= 'поле <em>Имя</em> не должно содержать цифры';
            }

            if(trim($patronymic == '')){
                $errors[] = 'поле <em>Отчество</em> не должно быть пустым';
            }
            if(preg_match('/[0-9]/',$patronymic)){
                $errors[]= 'поле <em>Отчество</em> не должно содержать цифры';
            }

            if(trim( $patronymic  == '')){
                $errors[] = 'поле <em>Отчество</em> не должно быть пустым';
            }

            if(trim($date_of_birth == '')){
                $errors[] = 'поле <em>дата рождения</em> не должно быть пустым';
            }

            if(trim( !strtotime($date_of_birth))){
                $errors[] = 'поле <em>дата рождения</em> введена неверно ';
            }

            if(!empty($errors)){

                return array_shift($errors);

            }
            else
            {


                //вычисляем возраст в годах
                $old = null;
                if (!empty($date_of_birth)){
                    $old =  (strtotime(date("d-M-Y")) - strtotime($date_of_birth ))/(60*60*24*365) ;
                    $old = floor($old);
                }


//                R::setup('mysql:host=localhost;dbname=21vek-tz;charset=utf8', 'root', '');
                \R::exec("INSERT INTO journal (firstname, lastname, patronymic, dateofbirth, old )
                          VALUES ('$firstname','$lastname','$patronymic','$date_of_birth','$old') ");

                header('Location: /');

            }


        }
    }

    /**
     * Поиск записи в бд при нажатии на  кнопку редактировть в журнале
     * @return NULL|\RedBeanPHP\OODBBean
     */
    public static function editUser()
    {

        if (isset($_POST['edit_cancel'])) header('Location: /');

        if (isset($_POST['edit'])) {

            $id = htmlspecialchars($_POST['edit']);

            return \R::findOne('journal', "id=$id");

        }


    }

    /**
     *  Проверка формы редактирования на ошибки и редактирование записи
     * @return mixed
     */
    public static function saveEdit()
    {
        if (isset($_POST['edit_save'])) {


            $errors =  array();

            $id              = htmlspecialchars( $_POST['edit_save']);
            $firstname       = htmlspecialchars( $_POST['edit_firstname']);
            $lastname        = htmlspecialchars( $_POST['edit_lastname']);
            $date_of_birth   = htmlspecialchars( $_POST['edit_date_of_birth']);
            $patronymic      = htmlspecialchars( $_POST['edit_patronymic']);


            if(trim($lastname == '')){
                $errors[]= 'поле <em>Фамилия</em> не должно быть пустым';
            }
            if(preg_match('/[0-9]/',$lastname)){
                $errors[]= 'поле <em>Фамилия</em> не должно содержать цифры';
            }

            if(trim($firstname == '')){
                $errors[] = 'поле <em>Имя</em> не должно быть пустым';
            }
            if(preg_match('/[0-9]/',$firstname)){
                $errors[]= 'поле <em>Имя</em> не должно содержать цифры';
            }

            if(trim($patronymic == '')){
                $errors[] = 'поле <em>Отчество</em> не должно быть пустым';
            }
            if(preg_match('/[0-9]/',$patronymic)){
                $errors[]= 'поле <em>Отчество</em> не должно содержать цифры';
            }

            if(trim( $patronymic  == '')){
                $errors[] = 'поле <em>Отчество</em> не должно быть пустым';
            }

            if(trim($date_of_birth == '')){
                $errors[] = 'поле <em>дата рождения</em> не должно быть пустым';
            }

            if(trim( !strtotime($date_of_birth))){
                $errors[] = 'поле <em>дата рождения</em> введена неверно ';
            }

            if(!empty($errors)){

                return array_shift($errors);

            }
            else
            {
                //вычисляем возраст в годах
                $old = null;
                if (!empty($date_of_birth)){
                    $old =  (strtotime(date("d-M-Y")) - strtotime($date_of_birth ))/(60*60*24*365) ;
                    $old = floor($old);
                }

                \R::exec("UPDATE journal SET firstname = '$firstname', lastname = '$lastname', old = '$old', dateofbirth = '$date_of_birth' , patronymic = '$patronymic' WHERE id = $id");

                header('Location: /');

            }


        }


    }

    /**
     * удаление записи из бд
     */
    public static function deleteUser()
    {

        if (isset($_POST['delete'])){

            $id = $_POST['delete'];
            \R::exec("DELETE FROM journal WHERE id='$id'");
            header('Location: /');
        }

    }

    /**
     * Получаем все записи из бд
     * @return array
     */
    public static function getAllUsers() :array
    {

   //   R::setup('mysql:host=localhost;dbname=21vek-tz;charset=utf8', 'root', '');
      return  \R::getAll("SELECT * FROM journal ORDER BY lastname");

    }





}































