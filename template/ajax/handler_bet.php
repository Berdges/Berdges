<?php
    session_start();
    //Подключение к базе данных
    $params = array('host' => 'localhost','dbname' => 'berdges_info','user' => 'root', 'password' => '');
    $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
    $db = new PDO($dsn, $params['user'], $params['password']);
    $db->exec("set names utf8");

	if(isset($_POST['radio_'])){

        $login = $_SESSION['login'];
        $id_post_news = $_POST['id_post_news'];
        $category = $_POST["category"];
        $date_end = $_POST["date"];
        //преобразуем строку и удаляем все лишнее символы, кроме цифр и переводим в int для дальнейшей работы.
        $score = intval(preg_replace('~[^0-9]+~','',$_POST['score_bet']));
        $k = $_POST["k"];
        $prize = intval(preg_replace('~[^0-9]+~','',$_POST["prize"]));
        $predict = $_POST["radio_"];
        $today = date("Y-m-d");
        $type = 'up_or_down';


        $sql = 'SELECT * FROM users WHERE login = :login';
        $info_user = $db->prepare($sql);
        $info_user->bindParam(':login', $login, PDO::PARAM_STR);
        $info_user->execute();

        $row = $info_user->fetch();
        
        if($row['score'] >= $score){
            $result = $row['score'] - $score;
            $_SESSION['score'] = $result;

            $update_db = $db->exec("UPDATE `users` SET `score`= '$result' WHERE login = '$login'");
            
            $addBet = $db->exec("INSERT INTO `bet` (`id_news`, `login_user`, `name_category`, `date_end`, `bet_score`, `factor`, `predict`, `prize`, `type`) VALUES ('$id_post_news', '$login', '$category', '$date_end', '$score', '$k', '$predict', '$prize', '$type');");
            echo "yes";
            exit;
        }else{
            echo "no";
            exit;
        }
        }else{
            if (isset($_POST['bet_from'])) {
                $id_post_news = $_POST['id_post_news'];
                $login = $_SESSION['login'];
                $category = $_POST["category"];
                $date_end = $_POST["date"];
            //преобразуем строку и удаляем все лишнее символы, кроме цифр и переводим в int для дальнейшей работы.
                $score = intval(preg_replace('~[^0-9]+~','',$_POST['score_bet']));
                $predict_from = $_POST["bet_from"];
                $predict_to = $_POST["bet_to"];

                $prize = intval(preg_replace('~[^0-9]+~','',$_POST["prize"]));
                $today = date("Y-m-d");
                $type = 'bet_on_value';

                $sql = 'SELECT * FROM users WHERE login = :login';
                $info_user = $db->prepare($sql);
                $info_user->bindParam(':login', $login, PDO::PARAM_STR);
                $info_user->execute();

                $row = $info_user->fetch();

                if($row['score'] >= $score){
                    $result = $row['score'] - $score;
                    $_SESSION['score'] = $result;

                $update_db = $db->exec("UPDATE `users` SET `score`= '$result' WHERE login = '$login'");

                $addBet = $db->exec("INSERT INTO `bet` (`id_news`, `login_user`, `name_category`, `date_end`, `bet_score`, `predict`, `predict_from`, `predict_to`, `prize`, `type`) VALUES ('$id_post_news', '$login', '$category', '$date_end', '$score', '$predict', '$predict_from','$predict_to', '$prize', '$type');");

                echo "yes";
                exit;
            }else{
                echo "no";
                exit;
            }
        }
    }
?>