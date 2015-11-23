<?php
session_start();
include_once 'Database.class.php';

if(!isset($_SESSION['user_session']) || !isset($_POST['friend'])){
	header('location:../dashboard');
}

try{
	/*** connect to the database ***/
	$dbh = Database::getDB();
	
	//get friend and sanitize
	$friend=filter_var($_POST['friend'], FILTER_SANITIZE_STRING);
	$user = $_SESSION['user_session'];
	

	if($friend === $user || $friend==='' || $friend='*'){
		header('location:../friends');
		exit();
	}
	
	if(isset($_POST['AddFriend'])){
		/*** The sql statement ***/
		$stmt =  $dbh->prepare("INSERT INTO Friends(user1, user2)
								VALUES(:user1, :user2)");
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user1', $friend, PDO::PARAM_STR );
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user2', $user, PDO::PARAM_STR );
		
		
		/*** exceute the query ***/
		$stmt->execute();
		
		/*** The sql statement ***/
		$stmt =  $dbh->prepare("INSERT INTO Friends(user1, user2)
								VALUES(:user1, :user2)");
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user1', $user, PDO::PARAM_STR );
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user2', $friend, PDO::PARAM_STR );
		
		/*** exceute the query ***/
		$stmt->execute();

		header('location:../friends');
		
	}
	elseif(isset($_POST['RemoveFriend'])){
		/*** The sql statement ***/
		$stmt =  $dbh->prepare("DELETE FROM Friends
								WHERE user1 = :user1
								AND user2 = :user2");
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user1', $friend, PDO::PARAM_STR );
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user2', $user, PDO::PARAM_STR );
		
		
		/*** exceute the query ***/
		$stmt->execute();
		
		/*** The sql statement ***/
		$stmt =  $dbh->prepare("DELETE FROM Friends
								WHERE user1 = :user1
								AND user2 = :user2");
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user1', $user, PDO::PARAM_STR );
		
		/*** Bind params ***/
		$stmt->bindParam ( ':user2', $friend, PDO::PARAM_STR );
		
		/*** exceute the query ***/
		$stmt->execute();
		
		header('location:../friends');
	}
	
	else{
		header('location:../dashboard');
	}

	
	
}catch(Exception $e){
	echo $e->getMessage();
}


?>