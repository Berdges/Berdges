<?php

class CabinetController
{

    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
                
        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }  
    
    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        
        $login = $user['login'];
        $password = $user['password'];
                
        $result = false;     

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if (!User::checkLogin($login)) {
                $errors[] = 'login не должен быть короче 5-ти символов';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 8-и символов';
            }
            
            if ($errors == false) {
                $result = User::edit($userId, $login, $password);
            }

        }

        require_once(ROOT . '/views/cabinet/edit.php');

        return true;
    }

}