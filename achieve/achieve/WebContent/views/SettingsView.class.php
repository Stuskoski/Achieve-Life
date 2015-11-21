<?php  
class SettingsView {
	
  public static function show() {  	
if(!isset($_SESSION['user_session'])){
  		header("Location:login");
  	}
  	
  	?>
  	
  	
  	<link href="assets/css/settings.css" rel="stylesheet">
	  <div id="setting">
	   <div class="overlay">
	  	<div class="container">
	  	<div class ="link"><a href="viewchallenges">View Challenges Sent To You</a></div>
	  	<div class ="link"><a href="verifychallenges">Verify Challenges You Sent</a></div>
	  	<div class="info"><span>You Have <?php GetProfileInfo::getPoints($_SESSION['user_session']);?> Points</span></div>
	  	<div class="info"><span>You Are Rank: <?php GetProfileInfo::getRank($_SESSION['user_session']);?></span></div>
	  	<div class="info"><span>You Have The Title of: <?php GetProfileInfo::getTitle($_SESSION['user_session']);?></span></div>
	  	</div>
	  </div>
	 </div>
<?php 
	}
}
?>