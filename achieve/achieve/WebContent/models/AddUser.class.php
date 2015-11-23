<?php
session_start();
require_once("Database.class.php");

function addUser(){
	$fname = $lname = $email = $username = $passwd = $repasswd = "";
	$fnameErr = $lnameErr = $emailErr = $usernameErr = $passwdErr = $repasswdErr = "";
	$errCount = 0;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["fname"])) {
			$fname = stripInput($_POST["fname"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
				$fnameErr = "Only letters and spaces";
				$errCount++;
			}
		}
		if (!empty($_POST["lname"])) {
			$lname = stripInput($_POST["lname"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
				$lnameErr = "Only letters and spaces";
				$errCount++;
			}
		}
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
			$errCount++;
		} else {
			$email = stripInput($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$errCount++;
			}
		}
	
		if (empty($_POST["username"])) {
			$usernameErr = "Username is required";
			$errCount++;
		} else {
			$username = stripInput($_POST["username"]);
		}
			
		if (empty($_POST["passwd"])) {
			$passwdErr = "Password is required";
			$errCount++;
		} else {
			$passwd = stripInput($_POST["passwd"]);
			if (empty($_POST["repasswd"])) {
				$repasswdErr = "Retype password is required";
				$errCount++;
			} else {
				$repasswd = stripInput($_POST["repasswd"]);
				if($passwd != $repasswd){
					$passwdErr = "Passwords do not match";
					$errCount++;
				}
			}
		}
	
		if ($errCount > 0){
			echo '<script type="text/javascript">alert("errors")</script>';
		} else {
			try{
				
				$dbh = Database::getDB();
					
				$stmt =  $dbh->prepare("INSERT INTO Users(firstName, lastName, userName, email, password, rank, title, points, honesty)
												Values(:firstName, :lastName, :userName, :email, :password, :rank, :title, :points, :honesty)");
				$stmt->bindValue(':firstName', $fname, PDO::PARAM_STR);
				$stmt->bindValue(':lastName', $lname, PDO::PARAM_STR);
				$stmt->bindValue(':userName', $username, PDO::PARAM_STR);
				$stmt->bindValue(':email', $email, PDO::PARAM_STR);
				$stmt->bindValue(':password', sha1($passwd), PDO::PARAM_STR);
				$stmt->bindValue(':rank', '1', PDO::PARAM_STR);
				$stmt->bindValue(':title', 'Peasant', PDO::PARAM_STR);
				$stmt->bindValue(':points', '0', PDO::PARAM_STR);
				$stmt->bindValue(':honesty', '100', PDO::PARAM_STR);
				$stmt->execute ();
			} catch(Exception $e){
				echo "<br>" . $e->getMessage() . "</b>";
  			}
			
			Database::clearDB();
			
			header( "location:../login" );
		}
	} else {
		header("location:../signup");
	}
}

function stripInput($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['submit'])){
	addUser();
}
?>