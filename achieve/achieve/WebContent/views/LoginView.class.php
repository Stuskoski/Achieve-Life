<?php  

class LoginView {
	
  public static function show() {  	
?> 
	<!DOCTYPE html>
	<html>
	<head>
	<title>User Login</title>
	<meta name= "keywords" content="Achieve Life">
	<meta name="description" content = "Login page for Achieve website">
	</head>
	<body>
	<a href="/ra_lab3/index.php">
	  <img src="resources/sitelogo.png" alt="Site Logo" style="width:250px;height:125px;border:0;">
	</a>
	
	<h2>Existing Users Login</h2>
	<form action ="login" method="Post">
	<p>User ID: <input type="text" name ="userID" placeholder = "abc123" maxlength="6"
	<?php if (!is_null($user)) {echo 'value = "'. $user->getUserID() .'"';}?>> 
	<span class="error">
	   <?php if (!is_null($user)) {echo $user->getError('userID');}?>
	</span>
	<br><br>
	Password: &nbsp;<input type="password" name="password" placeholder="password" maxlength="30"
	<?php if (!is_null($user)) {echo 'value = "'. $user->getPassword() .'"';}?>> 
	<span class="error">
	   <?php if (!is_null($user)) {echo $user->getError('password');}?>
	</span>
    </p>
	
	<p>
	<input type = "submit" name = "submit" value="Submit" >
	<input type="reset" value="Clear">
	</p>
	
	<i>New Users <a href="signup">Can Signup Here</a></i>
		
	</form>
	
	<?php
	if(isset( $_POST['userID'], $_POST['password'])){
	session_start();
	
	if(isset($_SESSION['user_session']))
	{
		echo"User is already logged in.  You must logout first!<br>";
	}
	
	if(!isset( $_POST['userID'], $_POST['password']))
	{
		echo"Please enter a valid username and password!<br>";
	}
	elseif (strlen( $_POST['userID']) > 6 || strlen($_POST['userID']) < 6)
	{
		echo "Incorrect Length for Username<br>";
	}
	elseif (strlen( $_POST['password']) < 8 || strlen($_POST['password']) > 30)
	{
		echo "Incorrect Length for Password<br>";
	}else{
	
	/***
	 * Data passed checks and is ready to be validated and sanitized for entry to database
	 */
	$user = filter_var($_POST['userID'], FILTER_SANITIZE_STRING);
	$pass = sha1($_POST['password']);
	
	//echo $user . "<br>";
	//echo $pass . "<br>";
	/** Encryption for when we do security**/
	//$phpro_password = sha1( $phpro_password );
	
	/**Database credentials**/
	$mysql_hostname = 'localhost';
	$mysql_username = 'root';
	$mysql_password = '';
	$mysql_dbname = 'ratemylecture';
	
	
	try
	{
		$dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
		/*** $message = a message saying we have connected ***/
	
		/*** set the error mode to excptions ***/
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		/*** prepare the select statement ***/
		$stmt = $dbh->prepare("SELECT userId, password FROM Users
                    WHERE userId = :user AND password = :pass");
	
		/*** bind the parameters ***/
		$stmt->bindParam(':user', $user, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $pass, PDO::PARAM_STR, 40);
	
		/*** execute the prepared statement ***/
		$stmt->execute();
	
		/*** check for a result ***/
		$user = $stmt->fetchColumn();
	
		/*** if we have no result then fail boat ***/
		if($user == false)
		{
			 echo "<b>Invalid User ID/Password, please try again.</b>";
		}
		/*** if we do have a result, all is well ***/
		else
		{
			/*** set the session user_id variable ***/
			$_SESSION['user_session'] = $user;
	
			/*** tell the user we are logged in ***/
			echo "You are now logged in<br>";
			header( "refresh:0;url=profile" );
		}
	
	}
	catch(Exception $e)
	{
		/*** if we are here, something has gone wrong with the database ***/
		 echo "We are unable to process your request. Please try again later<br>";
	}
	}
  }
 ?>
	
	
	
	</body>
	</html>
<?php 
  }
}
?>