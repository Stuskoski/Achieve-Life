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
	<p>Email: <input type="email" name ="email" placeholder = "email" maxlength="255"> 
	<br><br>
	Password: &nbsp;<input type="password" name="password" placeholder="password" maxlength="255"> 
    </p>
	
	<p>
	<input type = "submit" name = "submit" value="Submit" >
	<input type="reset" value="Clear">
	</p>
	
	<i>New Users <a href="">Can Signup Here</a></i>
		
	</form>	
	</body>
	</html>
<?php 
  }
}
?>