<?php  
class SettingsView {
	
  public static function show() {  	
if(!isset($_SESSION['user_session'])){
  		header("Location:login");
  	}
  	
  	$dbh = Database::getDB();
		

	/*** The sql statement ***/
	$stmt =  $dbh->prepare("SELECT * FROM Users WHERE username=:user");

	/*** Bind params ***/
	$stmt->bindParam ( ':user', $_SESSION['user_session'], PDO::PARAM_STR );

	/*** exceute the query ***/
	$stmt->execute();

	/*** set the fetch mode to associative array ***/
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	
	$array = $stmt->fetch();
  	
  	?>
  	
  	
  	<link href="assets/css/settings.css" rel="stylesheet">
	<div id="setting">
		<div class="overlay">
			<div class="container">
				<div class="row">
					<form class="form-horizontal" role="form" action="models/UpdateUser.class.php" method="post">
						<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
							<h2>Update User Info</h2>
							<div class="form-group">
								<div class="col-xs-6" style="padding-right: 7px;">
									<input type="text" class="input-small form-control" name="fname" placeholder="First name" value="<?php echo $array['firstName'];?>"> 
									<span class="form-control-feedback" id="fnameErr-feedback" style="right: 7px;"></span> 
									<span class="help-block" id="fnameErr"></span>
								</div>
								<div class="col-xs-6" style="padding-left: 7px;">
									<input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo $array['lastName'];?>">
									<span class="form-control-feedback" id="lnameErr-feedback"></span> 
									<span class="help-block" id="lnameErr"></span>
								</div>
							</div>
							<div class="form-group ">
								<div class="col-xs-12">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $array['email'];?>"> 
									<span class="form-control-feedback" id="emailErr-feedback"></span> 
									<span class="help-block" id="emailErr"></span>
								</div>
							</div>
							<div class="form-group ">
								<div class="col-xs-12">
									<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $array['userName'];?>"> 
									<span class="form-control-feedback" id="usernameErr-feedback"></span> 
									<span class="help-block" id="usernameErr"></span>
								</div>
							</div>
							<div class="form-group ">
								<div class="col-xs-12">
									<input type="password" class="form-control" name="passwd" placeholder="Password"> 
									<span class="form-control-feedback" id="passwdErr-feedback"></span> 
									<span class="help-block" id="passwdErr"></span>
								</div>
							</div>
							<div class="form-group ">
								<div class="col-xs-12">
									<input type="password" class="form-control" name="repasswd" placeholder="Retype password"> 
									<span class="form-control-feedback" id="repasswdErr-feedback"></span> 
									<span class="help-block" id="repasswdErr"></span>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div id="submitBtn">
								<input type="submit" class="btn btn-black-lg" value="Submit" name="submit"></input>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php 
	}
}
?>