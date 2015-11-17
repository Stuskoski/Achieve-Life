<?php
class SignupController {

	public static function show() {  
		SignupView::show();
  	}
  	
  	public static function validate() {
  		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			
  		}
  	}
  	
  	public static function addUser() {
  		$returnId = 0;
  		try {
  			$db = Database::getDB();
  			$query = "INSERT INTO users (firstName, lastName, email, phoneN, username, userPasswordHash, personalUrl, month, selectId, radioId)
			            VALUES(:firstName, :lastName, :email, :phoneN, :username, :userPasswordHash, :personalUrl, :month, :selectId, :radioId)";
  			$statement = $db->prepare($query);
  			$statement->bindValue(":firstName", $firstName);
  			$statement->bindValue(":lastName", $lastName);
  			$statement->bindValue(":email", $email);
  			$statement->bindValue(":phoneN", $phoneN);
  			$statement->bindValue(":username", $username);
  			$statement->bindValue(":userPasswordHash", $passHash);
  			$statement->bindValue(":personalUrl", $personalUrl);
  			$statement->bindValue(":month", $month);
  			$statement->bindValue(":selectId", $selectId);
  			$statement->bindValue(":radioId", $radioId);
  			$statement->execute();
  			$statement->closeCursor();
  			$returnId = $db->lastInsertId("userId");
  			$myTags = $myUser->getGenreList();
  			NewUserDB::writeUserTags($db, $returnId, $myTags);
  		} catch ( PDOException $e ) { // Not permanent error handling
  			echo "<p>Error adding users ".$e->getMessage()."</p>";
  		}
  		return $returnId;
  	}
}
?>