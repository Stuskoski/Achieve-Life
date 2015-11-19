<?php
require_once ('Database.class.php');

session_start();

if(!isset($_SESSION['user_session'])){
	header("Location: login");
}


try {

	//Get value sent through git
	$value = $_GET['id'];
	$value = trim($value,'\'');

	$dbh = Database::getDB();

	//check if user is the owner of that challenge
	$ifuser = $dbh->prepare( "Select user1 FROM Challengeuser
							  WHERE cid = :id" );

	//bind params
	$ifuser->bindParam ( ':id', $value, PDO::PARAM_STR );

	//execute
	$ifuser->execute ();

	//fetch the correct value
	$row = $ifuser->fetch ( PDO::FETCH_ASSOC );

	//$user is equal to the correct value
	$user=$row['user1'];

	//if user is not the owner, redirect
	if($user !== $_SESSION['user_session']){
		header("Location: ../login");
	}

	//continue with delete if the owner was the true owner
	$stmt = $dbh->prepare ( "DELETE FROM Challengeuser
							 WHERE cid = :id" );
	
	$stmt->bindParam ( ':id', $value, PDO::PARAM_STR );
	
	$stmt->execute ();

	Database::clearDB();
	
	header("location: ../viewchallenges");


}catch(Exception $e){
	Database::clearDB();
	echo $e->getMessage();
	header("Location: login");
}
?>