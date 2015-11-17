<?php  
class SignupView {
  public static function show() {  	
?>
<link href="assets/css/signup.css" rel="stylesheet">
 <div id="signup">
   <div class="overlay">
	<div class="container">
		<div class="row">
			<form class="form-horizontal" role="form" action="controllers/SignupController.class.php" method="post">
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
					<h2>Signup Form</h2>
					<div class="form-group">
						<div class="col-xs-6" style="padding-right: 7px;">
							<input type="text" class="input-small form-control" name="fname" placeholder="First name"> 
							<span class="form-control-feedback" id="fnameErr-feedback" style="right: 7px;"></span> 
							<span class="help-block" id="fnameErr"></span>
						</div>
						<div class="col-xs-6" style="padding-left: 7px;">
							<input type="text" class="form-control" name="lname" placeholder="Last name">
							<span class="form-control-feedback" id="lnameErr-feedback"></span> 
							<span class="help-block" id="lnameErr"></span>
						</div>
					</div>
					<div class="form-group required">
						<div class="col-xs-12">
							<input type="email" class="form-control" name="email" placeholder="Email" required> 
							<span class="form-control-feedback" id="emailErr-feedback"></span> 
							<span class="help-block" id="emailErr"></span>
						</div>
					</div>
					<div class="form-group required">
						<div class="col-xs-12">
							<input type="text" class="form-control" name="username" placeholder="Username" required> 
							<span class="form-control-feedback" id="usernameErr-feedback"></span> 
							<span class="help-block" id="usernameErr"></span>
						</div>
					</div>
					<div class="form-group required">
						<div class="col-xs-12">
							<input type="password" class="form-control" name="passwd" placeholder="Password" required> 
							<span class="form-control-feedback" id="passwdErr-feedback"></span> 
							<span class="help-block" id="passwdErr"></span>
						</div>
					</div>
					<div class="form-group required">
						<div class="col-xs-12">
							<input type="password" class="form-control" name="repasswd" placeholder="Retype password" required> 
							<span class="form-control-feedback" id="repasswdErr-feedback"></span> 
							<span class="help-block" id="repasswdErr"></span>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div id="submitBtn">
						<button type="submit" class="btn btn-black-lg">Submit</button>
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