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
	<!--
	<a href="/ra_lab3/index.php">
	  <img src="resources/sitelogo.png" alt="Site Logo" style="width:250px;height:125px;border:0;">
	</a>-->
	
	<h2>Existing Users Login</h2>
	<form action ="login" method="Post">
	<p>Email: <input type="email" name ="email" placeholder = "email" maxlength="255"> 
	<br><br>
	Password: &nbsp;<input type="password" name="password" placeholder="password" maxlength="255"> 
    </p>
	
	<p>
	<input type = "submit" name = "submit" value="Submit" >
	<input type="reset" value="Clear">
	</p>
	<i>New Users <a href="signup">Can Signup Here</a></i>
	
	
	<?php
	/***Validate users against the php database, uses the Database class to make the connection and then close when done***/
	
	if(isset ($_POST['email'], $_POST['password'])){
	try{
		
	session_start();
		
	$dbh = Database::getDB();
	
	$stmt = $dbh->prepare ( "SELECT userName FROM Admins
        						   WHERE email = :email AND password = :password" );
	
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	
	
	$stmt->bindParam ( ':email', $_POST['email'], PDO::PARAM_STR );
	$stmt->bindParam ( ':password', $password, PDO::PARAM_STR, 40 );
	
	$stmt->execute ();
	
	$row = $stmt->fetch ( PDO::FETCH_ASSOC );
	
	/***If value is set(if user is in database with correct password), add his username to session variable and send to dashboard***/
	if(!is_null($row['userName'])){
	$_SESSION['user_session'] = $row['userName'];
	header("Location: dashboard");
	}
	else
	{
		throw new Exception("Invalid username/password");
	}
		
	
	Database::clearDB();
	
	/***Catch error and print to screen for now***/
	}catch(Exception $e){
		echo "<br><br><b>" . $e->getMessage() . "</b>";	
	}
	?>
		
	</form>	
	</body>
	</html>
<?php 
	}
  }
}
?>