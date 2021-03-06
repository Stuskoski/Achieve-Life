<?php  

class ChallengeView {
	
  public static function show() {  
  	
  	if(!isset($_SESSION['user_session'])){
  		header("Location:login");
  	}
  	
  	?>
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="assets/js/challenge.js"></script> 
  	<link href="assets/css/challenge.css" rel="stylesheet">
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
						<h1>Create A Challenge</h1>
					</div>
				 </div>
		         <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
		        </div>
		  <!-- Create a challenge form. Submitted with ajax or php -->
		  <form id="challenge-form" action="models/AddChallenge.class.php" method="post">
	  	
	  	
			<div class="row scroll-me">
			 <div class="col-lg-0 col-md-0 col-sm-0 col-xs-0"></div>
			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	  	
			  	<div class="challenge-pic">
			  	    <div class="thumbnaild">
			  			<?php 
					  		//get the picture from the database
					  		ChallengeController::getPic($_SESSION['user_session']);
				  		?>
			  		</div>
			  		<!--<img src ="assets/img/generic.png" alt="Profile Picture" style="width:135px;height:135px;">   default pic, database looks for pic, default if not found-->
			  		<h4>Name of Challenge</h4>
	            	<input class="submit-form-name" type="text" name="nameOfChallenge" maxlength="30" pattern="[a-zA-Z!? ]{2,30}" title="Please enter a valid name using A-Z" placeholder="Challenge Name" required
	            	value="<?php if(isset($_SESSION['nameOfChallenge'])){
	            							echo $_SESSION['nameOfChallenge'];
	            							unset ($_SESSION['nameOfChallenge']);}
	            		?>">
	            	<h4>Number of Points</h4>
	            	<input class ="submit-form-name" type='number' id='numberinput' name='numPoints' value="<?php if(isset($_SESSION['numPoints'])){
	            																									echo $_SESSION['numPoints'];
	            																									unset ($_SESSION['numPoints']);
	            																								  }else{
	            																								    echo "5";}
	            																								    ?>" step="5" min="5" max="<?php GetMaxPoints::getMax();?>"/>
	        	</div>
	         </div>
	         <div class="col-lg-0 col-md-0 col-sm-0 col-xs-0"></div>
	        </div>
	        
	        
        	
        	<div>
        	    <h4>Challenge Description</h4>
		  		<textarea class="form-control submit-form" rows="3" id="comment" name="description" placeholder="Description" required><?php if(isset($_SESSION['description'])){
		  																																		echo $_SESSION['description'];
		  																																		unset($_SESSION['description']);}?></textarea>
			</div>
		  	
		  	<div><input id="btn-add" type="button" class="btn btn-challenge" value="Add Users"></div>
		  	<div id="add-users" class="add-users-class">
		  		<div class="hint"><span class="makeMeColor">Search:</span><input type="text" onkeyup="showHint(this.value)" onsubmit="enterHint(this.value)">
		  			<span class="makeMeColor">Suggestions: </span><span id="txtHint"></span></div>
				<textarea class="form-control" rows="3" name="users" required placeholder="Enter friends to send challenge to.  Seperate by commas."></textarea>
			</div>			
		  	
		  	
		  	<div class="row scroll-me">
			 <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
			 <div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">	  	
			  	<div class="form-group">	
		  		  <div><input type="submit" class="btn btn-challenge" value="Send Challenge" name="submit"></div>
		  		</div>
	         </div>
	         <div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
	        </div>
	  	  </form>
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