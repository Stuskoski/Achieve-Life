<?php

class ViewChallengesView{
	public function show(){
	?>
	
  	<script src="assets/js/challenge.js"></script> 
  	<link href="assets/css/viewchallenges.css" rel="stylesheet">
	  <div id="dashboard">
	   <div class="overlay">
	  	<div class="container">
	  	 <!-- Title of the page, dynamically spaced-->
	  	    <div class="row scroll-me">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
			
			
			
				<div class="row scroll-me">
				 <div class="col-lg-1 col-md-2 col-sm-2 col-xs-0"></div>
				 <div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">
		   			<div id="review-title">
						<h1>View Challenges</h1>
					</div>
				 </div>
		         <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
		        </div>
		        
		        <?php GetChallenges::getC($_SESSION['user_session']);?>

			</div>	
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
			</div>
	  	</div>
	  </div>
	 </div>
	
	
	
	
	
	
	<?php 
	}
}
?>