<?php
session_start();
include_once 'Database.class.php';

if(!isset($_SESSION['user_session']) || !isset($_POST['friend'])){
	header('location:../dashboard');
}

try{
	/*** connect to the database ***/
	$dbh = Database::getDB();
	
	if(isset($_POST['AddFriend'])){
		/*** The sql statement ***/
		$stmt =  $dbh->prepare("");
		
		//get friend and sanitize
		$friend=filter_var($_POST['friend'], FILTER_SANITIZE_STR);
		
	}
	elseif(isset($_POST['RemoveFriend'])){
		/*** The sql statement ***/
		$stmt =  $dbh->prepare("");
		
		//get friend and sanitize
		$friend=filter_var($_POST['friend'], FILTER_SANITIZE_STR);
	}
	
	else{
		header('location:../dashboard');
	}
	
	
	
	/*** Bind params ***/
	$stmt->bindParam ( ':user', $user, PDO::PARAM_STR );
	
	/*** exceute the query ***/
	$stmt->execute();
	
	/*** set the fetch mode to associative array ***/
	$stmt->setFetchMode(PDO::FETCH_NUM);
	
	/*** set the header for the image ***/
	//$array = $stmt->fetch();
	
	/***Parse through the list***/
	while ($row = $stmt->fetch()) {
	   //echo $row[0] . "\n";
	   $ary[]=$row[0];
	 }
	
	/***Clear the connection to the database***/
	Database::clearDB();
	
	return $ary;
	
	
}catch(Exception $e){
	echo $e->getMessage();
}







?>