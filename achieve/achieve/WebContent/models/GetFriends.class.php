<?php
include_once("Database.class.php");

class GetFriends{
	public function getAll($user){
		if(!is_null($user)){
			try{
				//echo $user;
				/*** connect to the database ***/
				$dbh = Database::getDB();
				
				
				/*** The sql statement ***/
				$stmt =  $dbh->prepare("SELECT user2 FROM Friends WHERE user1=:user
										UNION 
										Select user1 FROM Friends WHERE user2=:user");
				
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
				   print $row[0] . "\n";
				 }
				
				/***Clear the connection to the database***/
				Database::clearDB();
				
				
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
	}
}