<?php  

class FriendsView {
	
  public static function show() {  
  	
  	if(!isset($_SESSION['user_session'])){
  		header("Location:login");
  	}
  	
  	?>
  	
  	<script src="assets/js/friends.js"></script> 
  	<link href="assets/css/friends.css" rel="stylesheet">
	  <div id="friends">
	   <div class="overlay">
	  	<div class="container">
	  	
	  		<div class="row scroll-me">
			 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>
			 <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
		  		<div class="row scroll-me">
				 <div class="col-lg-1 col-md-2 col-sm-2 col-xs-0"></div>
				 <div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">
		   			<div id="review-title">
						<h1>Friends List</h1>
					</div>
					
			        <div class="container display-friends">
			        	<?php 
			        		$array = GetFriends::getAll($_SESSION['user_session']);
			        		foreach($array as $val){
			        			echo '<h4>' . $val . '</h4>';
			        		}
			        	?>
				        </div>
				   <form action="models/FriendAction.php" method="post">
			        	<input id="btn-add" type="submit" class="btn btn-add-friends btn-1" value="Add Friend" name="AddFriend">
			        	<input id="btn-add" type="submit" class="btn btn-remove-friends btn-2" value="Remove Friend" name="RemoveFriend">
			        	<span id="Suggestion">Suggestions: </span><span id="txtHint"></span>
			        	<div class="hint"><span class="makeMeColor">Find Users:</span><input name ="friend" class="hintInput" type="text" onkeyup="showAllUsers(this.value)" onsubmit="enterHint(this.value)">
			  			</div>	        	
			       </form>  
				 </div>
		         <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
		        </div>
		        
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