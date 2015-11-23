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
  				<div class="row">
  					<div class="col-xs-12">
  						<div class="infoHead"><span class="h1">Welcome <?php echo $_SESSION['user_session']?></span></div>
  						<hr>
  					</div>
  					<div class="col-md-4">
  						<div class="infoHead"><span class="h2">Stats</span></div>
					  	<div class="info"><span>Title: <?php GetProfileInfo::getTitle($_SESSION['user_session']);?></span></div>
					  	<div class="info"><span>Points: <?php GetProfileInfo::getPoints($_SESSION['user_session']);?></span></div>
					  	<div class="info"><span>Rank: <?php GetProfileInfo::getRank($_SESSION['user_session']);?></span></div>
					  	<div class="info"><span>Honesty Rating: <?php GetProfileInfo::getHonesty($_SESSION['user_session']);?>%</span></div>
  					</div>
  					<div class="col-md-4">
  					
  					</div>
  					<div class="col-md-4">
  					
  					</div>
  					<div class="col-xs-12" style="text-align: center; padding-top: 200px;">
  						<hr>
  						<div class="link"><a href="friends">Friends List</a></div>
					  	<div class="link"><a href="viewchallenges">View Challenges Sent To You</a></div>
					  	<div class="link"><a href="verifychallenges">Verify Challenges You Sent</a></div>
  					</div>
  				</div>
  			</div>
  		</div>
 	</div>
		 	
  	<?php 
  }
}
?>