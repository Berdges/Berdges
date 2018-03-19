<?php


class UserController
{

    public function actionRegister()
    {
        $login = '';
        $password = '';
        $result = false;
        
        if (isset($_POST['registration'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if (!User::checkLogin($login)) {
                $errors[] = 'Ваш логин не должен быть короче 5-и символов';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 8-и символов';
            }
            
            if (User::checkLoginExists($login)) {
                $errors[] = 'Такой login уже используется';
            }
            
            if ($errors == false) {
                $result = User::register($login, $password);
            }

        }

        header("Location: /");

        return true;
    }

    public function actionLogin()
    {
        $login = '';
        $password = '';
        
        if (isset($_POST['enter'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $errors = false;
                        
            // Валидация полей
            if (!User::checkLogin($login)) {
                $errors[] = 'Неправильно введён логин, либо такой уже существует';
            }            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($login, $password);
            
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /cabinet/"); 
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }
    
    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }
}
