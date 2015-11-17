<?php
function addChallenge(){
	echo $_POST['nameOfChallenge'] . "<br>";
	echo $_POST['numPoints'] . "<br>";
	echo $_POST['description'] . "<br>";
	echo $_POST['users'] . "<br>";
	
	//connect to DB, AIM
	$dbh = Database::getDB();
	
	//select the img based on the user named passed, SET
	$stmt =  $dbh->prepare("INSERT INTO Challenges(cPic, name, points, description, users) 
										Values(:cPic, :name, :points, :description, :users)");
	
	//Sanitize and verify!
	$name = 
	
	//bind
	$stmt->bindParam ( ':name', $name, PDO::PARAM_STR );
	$stmt->bindParam ( ':user', $user, PDO::PARAM_STR );
	
}

if(isset($_POST['submit'])){
	addChallenge();
}
	
?>