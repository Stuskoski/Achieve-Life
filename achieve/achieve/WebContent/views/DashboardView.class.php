<?php  

class DashboardView {
	
  public static function show() {  
  	
  	if(!isset($_SESSION['user_session'])){
  		header("Location:login");
  	}
  	
  	?>
  	
  	
  	<link href="assets/css/dashboard.css" rel="stylesheet">
	  <div id="dashboard">
	   <div class="overlay">
	  	<div class="container">
	  	<div class ="link"><a href="viewchallenges">View Your Challenges</a></div>
	  	<div class ="link"><a href="verifychallenges">Verify Your Challenges</a></div>
	  	</div>
	  </div>
	 </div>
		
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	<?php 
  }
}
?>