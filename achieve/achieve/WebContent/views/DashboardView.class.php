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
  					<div class="col-md-2 infoSec br">
  						<div class="infoHead"><span class="h2">Stats</span></div>
					  	<div class="info"><span>Title: <?php GetProfileInfo::getTitle($_SESSION['user_session']);?></span></div>
					  	<div class="info"><span>Points: <?php GetProfileInfo::getPoints($_SESSION['user_session']);?></span></div>
					  	<div class="info"><span>Rank: <?php GetProfileInfo::getRank($_SESSION['user_session']);?></span></div>
					  	<div class="info"><span>Honesty Rating: <?php GetProfileInfo::getHonesty($_SESSION['user_session']);?>%</span></div>
  					</div>
  					<div class="col-md-8 infoSec bl br">
  						<div class="infoHead"><span class="h2">Dashboard</span></div>
  						<div class="info"><span>Currently, our information about our users is stored on separate pages for development purposes, eventually most of these components would move over to the dashboard or have subsets on the specifc info requested</span></div>
  					</div>
  					<div class="col-md-2 infoSec bl">
  						<div class="infoHead"><span class="h2">Links</span></div>
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