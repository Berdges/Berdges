<?php
if(isset($_POST['login'])){
	$login = $_POST['login'];

    $params = array('host' => 'localhost','dbname' => 'berdges_info','user' => 'root', 'password' => '');
    $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
    $db = new PDO($dsn, $params['user'], $params['password']);
    $db->exec("set names utf8");

    $sql = 'SELECT COUNT(*) FROM users WHERE login = :login';
    $result = $db->prepare($sql);
    $result->bindParam(':login', $login, PDO::PARAM_STR);
    $result->execute();

    if ($result->fetchColumn()){
        $test = true;
    }

	if($test){
		echo "no";
	}else{
		echo "yes";
	}
}
?>