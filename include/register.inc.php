<?php

if(isset($_POST["register"])){

	$name = $_POST["name"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false){
		header("location:../register.php?error=emptyinput");
		exit();
	}

	if(invalidEmail($email) !== false){
		header("location:../register.php?error=invalidemail");
		exit();
	}

	if(pwdMatch($pwd, $pwdRepeat) !== false){
		header("location:../register.php?error=paswordmissmatch");
		exit();
	}
	createUser($conn, $name, $email, $pwd);
}
else {
	header("location:../.register.php");
}