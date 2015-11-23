<?php
include_once("Database.class.php");
session_start();

	
if(isset($_SESSION['user_session'])){
	try{
		//echo $user;
		/*** connect to the database ***/
		$dbh = Database::getDB();


		/*** The sql statement ***/
		$stmt =  $dbh->prepare("SELECT userName
								FROM Users");

		/*** Bind params ***/
		$stmt->bindParam ( ':user', $_SESSION['user_session'], PDO::PARAM_STR );

		/*** exceute the query ***/
		$stmt->execute();

		/*** set the fetch mode to associative array ***/
		$stmt->setFetchMode(PDO::FETCH_NUM);

		/*** set the header for the image ***/
		//$array = $stmt->fetch();

		/***Parse through the list***/
		while ($row = $stmt->fetch()) {
			$a[] = $row[0];
		}
		/***Clear the connection to the database***/
		Database::clearDB();


	}catch(Exception $e){
		echo $e->getMessage();
	}
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
	$q = strtolower($q);
	$len=strlen($q);
	foreach($a as $name) {
		if (stristr($q, substr($name, 0, $len))) {
			if ($hint === "") {
				$hint = $name;
			} else {
				$hint .= ", $name";
			}
		}
	}
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>
