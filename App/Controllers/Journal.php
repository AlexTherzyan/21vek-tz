<?php

namespace App\Controllers;


use App\Models\JournalModel;
use Core\View;



class Journal extends AppController
{



    /**
     * Главная страница
     */
    public function indexAction()
    {
      $users =  JournalModel::getAllUsers();
      JournalModel::deleteUser();


      View::render('index.php', [
            'users' => $users
        ]);



    }


    /**
     * Страница редактирования
     */
    public function editAction()
    {


        $edit = JournalModel::editUser();
        $save = JournalModel::saveEdit();

        View::render('edit.php', [
            'edit' => $edit,
            'error' => $save
        ]);
    }

    /**
     * Страница нового пользователя
     */
    public function newAction()
    {

       $add = JournalModel::addUser();

        View::render('new.php', [
            'error' => $add
        ]);
    }












}































