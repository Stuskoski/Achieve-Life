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
		$ifuser = $dbh->prepare( "SELECT s.dateCreated, s.note, s.submitPic, s.user1, s.cid
								  FROM Submissions s
								  JOIN
								  Challenges c
								  ON c.cid = s.cid
							      WHERE s.cid = :cid
								  " );
	
		//bind params
		$ifuser->bindParam ( ':cid', $value, PDO::PARAM_STR );
	
		//execute
		$ifuser->execute ();
	
		//fetch the values
		while($row = $ifuser->fetch ( PDO::FETCH_ASSOC )){
			print_r($row);
		}

	
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
							<h1>Verify Submissions</h1>
						</div>
					 </div>
			         <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
			        </div>
		  	
		  	
		  	  </div>
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