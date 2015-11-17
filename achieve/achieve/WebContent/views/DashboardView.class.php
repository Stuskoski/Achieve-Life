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
	  	</div>
	  </div>
	 </div>
		
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	<?php 
  }
}
?>