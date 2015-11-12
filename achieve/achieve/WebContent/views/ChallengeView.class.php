<?php  

class ChallengeView {
	
  public static function show() {  
  	
  	if(!isset($_SESSION['user_session'])){
  		header("Location:login");
  	}
  	
  	?>
  	
  	
  	<link href="assets/css/challenge.css" rel="stylesheet">
	  <div id="dashboard">
	   <div class="overlay">
	  	<div class="container">
	  	</div>
	  </div>
	 </div>
		
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	<?php 
  }
}
?>