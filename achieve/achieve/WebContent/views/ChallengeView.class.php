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
	  	 
	  	   <!-- Title of the page, dynamically spaced-->
	  	   <div class="row scroll-me">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
	   			<div id="review-title">
					<h1>Create A Challenge</h1>
				</div>
			
		   
		  <!-- Create a challenge form. Submitted with ajax -->
		  <form id="challenge-form" action="" method="post">
	  	
	  	
			<div class="row scroll-me">
			 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
			 <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">	  	
			  	<div>
			  		<h4>Name of Challenge</h4>
	            	<input class="submit-form-name" type="text" name="nameOfChallenge" maxlength="30" pattern="[a-zA-Z!? ]{2,30}" title="Please enter a valid name using A-Z"
	            	placeholder="Challenge Name" >
	        	</div>
	         </div>
	         <div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
	        </div>
        	
        	<div>
        	    <h4>Challenge Description</h4>
		  		<textarea class="form-control submit-form" rows="3" id="comment" name="comments" placeholder="Description"></textarea>
			</div>
			
			<div>
				<textarea class="form-control submit-form" rows="3" id="comment" name="comments" placeholder="Users"></textarea>
			</div>
		  	
		  	<div><input type="button" class="btn btn-challenge" value="Add Users"></div>
		  	
	  		<div class="form-group">	
	  		  <div><input type="submit" class="btn btn-challenger" value="Send Challenge"></div>
	  		</div>
	  		
	  	 </form>
	  	 </div>
		 <div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
		</div>
	  </div>
	 </div>
	</div>
		
		
		
	<!-- Scripts here...Need to put into js file -->	
  	<script type='text/javascript'>
    /* attach a submit handler to the form */
    $("#challenge-form1").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get some values from elements on the page: */
      var $form = $( this ),
          url = $form.attr( 'action' );

      /* Send the data using post */
      var posting = $.post( url, { name: $('#name').val(), name2: $('#name2').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
        alert('success');
      });
    });
	</script>
  	

  	
  	<?php 
  }
}
?>