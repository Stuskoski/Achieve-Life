<?php
class GuildView{

	public static function show(){
		if(!isset($_SESSION['user_session'])){
			header("Location:login");
		}
		?>
		
		
		<link href="assets/css/guild.css" rel="stylesheet">
		  <div id="guild">
		   <div class="overlay">
		  	<div class="container">
		  	
	  	   <div class="row scroll-me">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
	   			
	   			<div class="row scroll-me">
				 <div class="col-lg-1 col-md-2 col-sm-2 col-xs-0"></div>
				 <div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">
		   			<div id="review-title">
						<h1>Create A New Guild</h1>
					</div>
				 </div>
		         <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
		        </div>
			
		   
		  <!-- Guild Creation Form -->
		  <form id="guild-form" action="" method="post">
	  	
	  	
			<div class="row scroll-me">
			 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
			 <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">	  	
			  	<div>
			  		<h4>Name of Guild</h4>
	            	<input class="submit-form-name" type="text" name="nameOfGuild" maxlength="30" pattern="[a-zA-Z!? ]{2,30}" title="Please enter a valid name using A-Z"
	            	placeholder="Guild Name" required >
	        	</div>
	         </div>
	         <div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
	        </div>
        	
        	<div>
        	    <h4>Guild Description</h4>
		  		<textarea class="form-control submit-form" rows="3" id="comment" name="comments" placeholder="Description" required></textarea>
			</div>
			
			<div>
				<h4>Guild Members</h4>
				<textarea class="form-control submit-form" rows="3" id="comment" name="comments" placeholder="Users" required></textarea>
			</div>
		  	
		  	<div><input id="btn-add" type="button" class="btn btn-add" value="Add Users"></div>
		  	
		  	
		  	<div class="row scroll-me">
			 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
			 <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">	  	
			  	<div class="form-group">	
		  		  <div><input type="submit" class="btn btn-add" value="Create Guild"></div>
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
		
				
	  	<script type='text/javascript'>
    /* attach a submit handler to the form */
    $("#guild-form1").submit(function(event) {

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