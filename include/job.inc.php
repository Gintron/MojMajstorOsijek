<?php

if(isset($_POST["submitJob"])){

    $nameOfJob =  $_POST["nameOfJob"];
    $category =  $_POST["category"];
    $jobDescripiton =  $_POST["jobDescription"];
    $telephoneNumber =  $_POST["telephoneNumber"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(emptyCreateJobFields($nameOfJob, $jobDescripiton, $telephoneNumber, $category) !== false){
		header("location:../job.php?error=emptyinput");
		exit();
    }
    createJob($conn, $nameOfJob, $category, $jobDescripiton, $telephoneNumber);
}