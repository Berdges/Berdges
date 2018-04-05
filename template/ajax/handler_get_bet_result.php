<?php 
    header('Content-type: application/json');

	session_start();
    $data = array();
	//Подключение к базе данных

	$params = array('host' => 'localhost','dbname' => 'berdges_info','user' => 'root', 'password' => '');
    $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
    $db = new PDO($dsn, $params['user'], $params['password']);
    $db->exec("set names utf8");

    $login_user = $_SESSION['login'];
    $today = date("Y-m-d");

    $sql_bet = 'SELECT * FROM bet WHERE login_user = :login_user AND date_end = :today AND viewed = 0';
    
    $info_bet = $db->prepare($sql_bet);
    $info_bet->bindParam(':login_user', $login_user, PDO::PARAM_STR);
    $info_bet->bindParam(':today', $today, PDO::PARAM_STR);
    $info_bet->execute();

    $i = 0;
    while($row = $info_bet->fetch()){
    	if ($row['viewed'] == 0) {

            $str = $_SESSION['count_bet_result'];
            $_SESSION['score'] = intval(preg_replace('~[^0-9]+~','',$_SESSION['score'])); 
            $count_bet_old = intval($str);

            $i++;
	    	$id_bet = $row['id'];	 
            $summa = $_SESSION['score'] + $row['prize'] + $row['bet_score'];
            $_SESSION['score'] = $summa;
        
            $addPrize = $db->exec("UPDATE `users` SET `score`= '$summa' WHERE login = '$login_user'");
            $updateStatusBet = $db->exec("UPDATE `bet` SET `viewed`= 1 WHERE id = '$id_bet'");

            $_SESSION['count_bet_result'] = $i+$count_bet_old;
            array_push($data, $_SESSION['count_bet_result'], $summa);
            echo json_encode($data);
            exit;
	    }
	}
 ?>