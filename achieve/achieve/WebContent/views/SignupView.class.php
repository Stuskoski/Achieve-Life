<?php  
class SignupView {
	
  public static function show() {  	
?> 
	<div class="row" id="forms">
		<form class="form-horizontal" role="form" action="" method="post">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
				<h2>Signup Form</h2>
				<div class="form-group">
					<label class="col-xs-12 control-label">Name</label>
					<div class="col-xs-6" style="padding-right: 7px;">
						<input type="text" class="input-small form-control" name="fname1"
							placeholder="First name"> <span class="form-control-feedback"
							id="fname1Err-feedback" style="right: 7px;"></span> <span
							class="help-block" id="fname1Err"></span>
					</div>
					<div class="col-xs-6" style="padding-left: 7px;">
						<input type="text" class="form-control" name="lname1"
							placeholder="Last name"> <span class="form-control-feedback"
							id="lname1Err-feedback"></span> <span class="help-block"
							id="lname1Err"></span>
					</div>
				</div>
				<div class="form-group required">
					<label class="col-xs-12 control-label">Email</label>
					<div class="col-xs-12">
						<input type="email" class="form-control" name="email1" required> <span
							class="form-control-feedback" id="email1Err-feedback"></span> <span
							class="help-block" id="email1Err"></span>
					</div>
				</div>
				<div class="form-group required">
					<label class="col-xs-12 control-label">Subject</label>
					<div class="col-xs-12">
						<input type="text" class="form-control" name="subject" required> <span
							class="form-control-feedback" id="subjectErr-feedback"></span> <span
							class="help-block" id="subjectErr"></span>
					</div>
				</div>
				<div class="form-group required">
					<label class="col-xs-12 control-label">Message</label>
					<div class="col-xs-12">
						<textarea class="form-control" rows="5" name="msg"
							placeholder="Enter message" required></textarea>
						<span class="form-control-feedback" id="msgErr-feedback"></span> <span
							class="help-block" id="msgErr"></span>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div id="submitBtn">
					<button type="submit" class="btn btn-white-lg">Submit</button>
				</div>
			</div>
		</form>
	</div>
	<?php
	}
}
?>