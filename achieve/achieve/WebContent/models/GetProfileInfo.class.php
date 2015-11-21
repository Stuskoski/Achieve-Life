<?php
class GetProfileInfo{
	public function getRank($user){
		$dbh = Database::getDB();
		
		//prepare sql statement
		$stmt = $dbh->prepare("SELECT rank
							   FROM Users
							   WHERE userName = :userName");
		
		//bind
		$stmt->bindParam ( ':userName', $user, PDO::PARAM_STR );
		
		//execute!
		$stmt->execute();
		
		//set the fetch mode to associative array
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		//fetch values
		$array = $stmt->fetch();
		
		echo $array['rank'];
		
		//Clear the connection to the database
		Database::clearDB();
	}
	
	public function getPoints($user){
		$dbh = Database::getDB();
		
		//prepare sql statement
		$stmt = $dbh->prepare("SELECT points
							   FROM Users
							   WHERE userName = :userName");
		
		//bind
		$stmt->bindParam ( ':userName', $user, PDO::PARAM_STR );
		
		//execute!
		$stmt->execute();
		
		//set the fetch mode to associative array
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		//fetch values
		$array = $stmt->fetch();
		
		echo $array['points'];
		
		//Clear the connection to the database
		Database::clearDB();
	}
	
	public function getTitle($user){
		$dbh = Database::getDB();
		
		//prepare sql statement
		$stmt = $dbh->prepare("SELECT title
							   FROM Users
							   WHERE userName = :userName");
		
		//bind
		$stmt->bindParam ( ':userName', $user, PDO::PARAM_STR );
		
		//execute!
		$stmt->execute();
		
		//set the fetch mode to associative array
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		//fetch values
		$array = $stmt->fetch();
		
		echo $array['title'];
		
		//Clear the connection to the database
		Database::clearDB();
	}
}