<?php

function connectDB(){
	try{
		return new PDO("mysql:host=127.0.0.1;dbname=login","dbuser","Sakurajim@1182");
	} catch (PDOException $e){
		echo $e->getMessage();
		exit;
	}
}

function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

function hashpass($pass){
    return (password_hash($pass, PASSWORD_DEFAULT));
}

function userMatch($email,$password,$dbh){
    $sql = "select * from users where email = :email and password = :password limit 1";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(":email"=>$email,"password"=>hashpass($password)));
    $user = $stmt->fetch();
    return $user ? $user : false;
}



?>