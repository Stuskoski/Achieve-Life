<?php
require_once ('Database.class.php');
require_once '../views/MasterView.class.php';


if(!isset($_SESSION['user_session'])){
	header("Location: login");
}


try {

	//Get value sent through git
	$value = $_GET['id'];
	$value = trim($value,'\'');
	
	$_SESSION['value'] = $value;


	$dbh = Database::getDB();


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
								<h1>Send Submission for Challenge</h1>
							</div>
						 </div>
				         <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
				        </div>
			  		
			  			<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?id=' . $value);?>" method="post">
						  <input class=".btn-challenge" type="hidden" name="MAX_FILE_SIZE" value="99999999" />
						  <div class=".btn-challenge"><input name="image" type="file" /></div>
						  <input class="form-control" type="text" name="note" placeholder="Challenge Note" maxlength="255" title="Please enter a valid note">
					      <div class=".btn-challenge"><input type="submit" value="Submit" /></div>
					    </form>
			  	
			  	  </div>
			  	  <div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
			  	 </div>
			  	</div>
			  </div>
			 </div>
			<?php 
	
	MasterView::showFooter2();
	
	
	if(!isset($_FILES['image']))
	{
		echo '<p>Please select a file</p>';
	}
	else
	{
		try    {
			upload($_POST['note']);
			/*** give praise and thanks to the php gods ***/
			echo '<p>Thank you for submitting</p>';
		}
		catch(Exception $e)
		{
			echo '<h4>'.$e->getMessage().'</h4>';
		}
	}
	
	
	
	


}catch(Exception $e){
	Database::clearDB();
	echo $e->getMessage();
	header("Location: login");
}




function upload($note){

	$tmpName = $_FILES['image']['tmp_name'];

	/*** check if a file was uploaded ***/
	if(is_uploaded_file($tmpName) && getimagesize($tmpName) != false)
	{
		/***  get the image info. ***/
		$size = getimagesize($tmpName);
		/*** assign our variables ***/
		$type = $size['mime'];
		$imgfp = fopen($_FILES['image']['tmp_name'], 'rb');
		//$data = fread($imgfp, filesize($tmpName));
		//$data = addslashes($data);
		$size = $size[3];
		$name = $_FILES['image']['name'];
		$maxsize = 99999999;
		$user = $_SESSION['user_session'];



		/***  check the file is less than the maximum file size ***/
		if($_FILES['image']['size'] < $maxsize )
		{
			/*** connect to db ***/
			$dbh = Database::getDB();

			/*** our sql query ***/

			$stmt = $dbh->prepare("INSERT INTO Submissions(user1, cid, submitPic, note)
									   VALUES(:user1, :cid, :submitPic, :note)");


			$userName = $_SESSION['user_session'];
			$val = $_SESSION['value'];
			unset($_SESSION['value']);

			//$note = "test note";
			/*** bind the params ***/
			$stmt->bindParam(':user1', $userName, PDO::PARAM_STR);
			$stmt->bindParam(':cid', $val, PDO::PARAM_INT);
			$stmt->bindParam(':submitPic', $imgfp, PDO::PARAM_LOB);
			$stmt->bindParam(':note', $note, PDO::PARAM_STR);

			/*** execute the query ***/
			$stmt->execute();
		}
		else
		{
			// if the file is not less than the maximum allowed, print an error
			throw new Exception("File Size Error");
		}
	}
	else
	{
		/*** throw an exception is image is not of type ***/
		throw new Exception("Unsupported Image Format!");
	}
}
?>