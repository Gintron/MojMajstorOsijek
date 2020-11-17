<?php


if(isset($_GET['delete'])){
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

    deleteJob($conn);
}