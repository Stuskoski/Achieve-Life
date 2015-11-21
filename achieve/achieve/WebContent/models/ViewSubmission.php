<?php
require_once 'Database.class.php';
require_once '../views/MasterView.class.php';

function verify(){
	
}

if(!isset($_SESSION['user_session'])){
	header("location: ../dashboard");
}else{
	try {
	
		//Get value sent through git
		$value = $_GET['id'];
		$value = trim($value,'\'');
	
		$dbh = Database::getDB();
	
		//check if user is the owner of that challenge
		$ifuser = $dbh->prepare( "SELECT *
								  FROM Submissions
								  WHERE sid =:sid");
	
		//bind params
		$ifuser->bindParam ( ':sid', $value, PDO::PARAM_STR );
	
		//execute
		$ifuser->execute ();

		$row = $ifuser->fetch ( PDO::FETCH_ASSOC );


	
		Database::clearDB();
	
		MasterView::showHeader2();
		?>
		<script src="../assets/js/challenge.js"></script> 
	  	<link href="../assets/css/viewchallenges.css" rel="stylesheet">
		  <div id="dashboard">
		   <div class="overlay">
		  	<div class="container">
		  	
		  		<div class="row scroll-me">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>
				<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
				
				
				
					<div class="row scroll-me">
					 <div class="col-lg-1 col-md-2 col-sm-2 col-xs-0"></div>
					 <div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">
			   			<div id="review-title">
							<h1>Submission From <?php echo $row['user1'];?></h1>
						</div>
					 </div>
			         <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
			        </div>
		  		
		  			<div class="container submission">
			  		    <span class="sub-pic"><?php echo '<img alt="No Picture Submitted" class="challengePic" style="width:360px;height:360px;" src="data:image/jpeg;base64,'.base64_encode( $row['submitPic'] ).'"/>';?></span>
			  			<span class="sub-date"><?php echo $row['dateCreated'];?></span>
			  			<h4><?php echo $row['note'];?></h4>
			  			<a href="NoAcceptSub.php?user=<?php echo $row['user1'] . "&id=" . $row['sid'];?>"><i class="ion-close no"></i></a>
			  			<a href="YesAcceptSub.php?user=<?php echo $row['user1'] . "&id=" . $row['sid'];?>"><i class="ion-checkmark yes"></i></a>
		  			</div>
		  	  </div>
		  	  <div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
		  	 </div>
		  	</div>
		  </div>
		 </div>
		<?php 
		MasterView::showFooter2();
		
	}catch(Exception $e){
		Database::clearDB();
		echo $e->getMessage();
		//header("Location: ../dashboard");
	}
	
	
	
}

?>