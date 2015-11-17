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
  			$query = "INSERT INTO users (firstName, lastName, email, username, userPasswordHash)
			            VALUES(:firstName, :lastName, :email, :phoneN, :username, :userPasswordHash)";
  			$statement = $db->prepare($query);
  			$statement->bindValue(":firstName", $firstName);
  			$statement->bindValue(":lastName", $lastName);
  			$statement->bindValue(":email", $email);
  			$statement->bindValue(":username", $username);
  			$statement->bindValue(":userPasswordHash", $passHash);
  			$statement->execute();
  			$statement->closeCursor();
  		} catch ( PDOException $e ) { // Not permanent error handling
  			echo "<p>Error adding users ".$e->getMessage()."</p>";
  		}
  		return $returnId;
  	}
}
?>