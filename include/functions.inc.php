<?php
function emptyInputSignup($name, $email, $pwd, $pwdRepeat)
{
	$result;
	if (empty($name) || empty($email) ||  empty($pwd) ||  empty($pwdRepeat)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}
function emptyCreateJobFields($nameOfJob, $jobDescripiton, $telephoneNumber, $category)
{
	$result;
	$default = "dodaj";

	if (empty($nameOfJob) || empty($jobDescripiton) ||  empty($telephoneNumber) || strcmp($category, $default) === 0) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email)
{
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
	$result;
	if ($pwd !== $pwdRepeat) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function emailExists($conn, $email)
{
	$sql = "SELECT * FROM users WHERE usersEmail = '$email';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd)
{
	$sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location:../register.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location:../register.php?error=none");
	exit();
}

function createJob($conn, $nameOfJob, $category, $jobDescripiton, $telephoneNumber)
{
	session_start();
	if(isset($_SESSION["userid"])){
		$id = $_SESSION["userid"];
	}
	$sql = "INSERT INTO jobs (jobName, jobCategory, jobDescription, jobPhoneNumber, userId) VALUES ('$nameOfJob', '$category', '$jobDescripiton', '$telephoneNumber', '$id');";
	if (mysqli_query($conn, $sql)) {
		header("location:../job.php?error=none");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function updateJob($conn, $nameOfJob, $category, $jobDescripiton, $telephoneNumber, $id)
{
	session_start();
	
	$sql = "UPDATE jobs SET jobName = '$nameOfJob' , jobCategory = '$category', jobDescription = '$jobDescripiton', jobPhoneNumber = '$telephoneNumber' WHERE jobId = '$id' ;";
	if (mysqli_query($conn, $sql)) {
		header("location:../profile.php?error=none");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
function emptyInputLogin($email, $pwd)
{
	$result;
	if (empty($email) ||  empty($pwd)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function loginUser($conn, $email, $pwd)
{
	$emailExists = emailExists($conn, $email);

	if ($emailExists === false) {
		header("location: ../login.php?error=emaildontexists");
		exit();
	}
	$pwdHashed = $emailExists["usersPwd"];

	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wrongpassword");
		exit();
	} else if ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $emailExists["usersId"];
		$_SESSION["userName"] = $emailExists["usersName"];
		header("location: ../index.php");
		exit();
	}
}
function deleteJob($conn){
	$id = $_GET['delete'];
    $sql = "DELETE FROM jobs WHERE jobId = '$id' ;";
    if (mysqli_query($conn, $sql)) {
		header("location:../profile.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
