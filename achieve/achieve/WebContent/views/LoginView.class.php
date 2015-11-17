<?php  
class LoginView {
	
  public static function show() {  	
?> 	
<link href="assets/css/signin.css" rel="stylesheet">
  <div id="home-login">
   <div class="overlay">
  	<div class="container">
      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Sign In</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn-custom btn-one" type="submit">Sign in</button>
        <button class="btn-custom btn-one" type="reset">Clear</button>
      </form>
      <div class="center"><i>New Users <a href="signup">Can Signup Here</a></i></div>
    </div> <!-- /container -->
   </div>
  </div>
	
	
	<?php
	/***Validate users against the php database, uses the Database class to make the connection and then close when done***/
	
	if(isset ($_POST['email'], $_POST['password'])){
	try{
		
	session_start();
		
	$dbh = Database::getDB();
	
	$stmt = $dbh->prepare ( "SELECT userName FROM Users
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
		
<?php 
	}
  }
}
?>