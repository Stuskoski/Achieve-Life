<?php
require_once 'Database.class.php';
session_start();


if(!isset($_SESSION['user_session'])){
	header("location: ../dashboard");
}

//get ID from get
$id = $_GET['id'];
$id = filter_var($id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//get rid of wildcards
if($id=="*"){
	header("location: ../dashboard");
}

$dbh = Database::getDB();

$qry = $dbh->prepare("DELETE FROM submissions
					  WHERE sid = :id");
//bind params
$qry->bindParam ( ':id', $id, PDO::PARAM_INT );

//execute
$qry->execute ();

header("location: ../verifychallenges");
?>