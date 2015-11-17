<?php
session_start();
require_once("Database.class.php");
require_once("GetFriends.class.php");

function addChallenge(){
	
if(checkFriends()){
	
	try{
	//connect to DB, AIM
	$dbh = Database::getDB();
	
	//select the img based on the user named passed, SET
	$stmt1 =  $dbh->prepare("SELECT pPic FROM Users WHERE userName= :user");
	
	//bind
	$stmt1->bindParam ( ':user', $_SESSION['user_session'], PDO::PARAM_STR );
	
	//execute!
	$stmt1->execute();
	
	//set the fetch mode to associative array
	$stmt1->setFetchMode(PDO::FETCH_ASSOC);
	
	//get into array, this holds the picture for resizing
	$array = $stmt1->fetch();
	
	//Must convert the blob string into a pic to turn into a thumbnail
	$img = imagecreatefromstring($array['pPic']);
	
	//Wont work without converting the blob
	$nWidth = imagesx($img); // get original source image width 
	$nHeight = imagesy($img); // and height
	
	// create small thumbnail, set dimensions
	$nDestinationWidth = 60; 
	$nDestinationHeight = 60;
	
	//Create a template for the image
	$oDestinationImage = imagecreate($nDestinationWidth, $nDestinationHeight);
	
	//resize image
	imagecopyresized(
			$oDestinationImage, $img,
			0, 0, 0, 0,
			$nDestinationWidth, $nDestinationHeight,
			$nWidth, $nHeight); 
	
	ob_start(); // Start capturing stdout.
	imageJPEG($oDestinationImage); // As though output to browser.
	$sBinaryThumbnail = ob_get_contents(); // the raw jpeg image data.
	ob_end_clean(); // Dump the stdout so it does not screw other output.
	
	//Output the thumbnail to see it
	//echo '<img src="data:image/jpeg;base64,'.base64_encode( $sBinaryThumbnail ).'"/>';
	
	//Get ready to insert into challenges
	$stmt =  $dbh->prepare("INSERT INTO Challenges(cPic, name, points, description, users, userName) 
										Values(:cPic, :name, :points, :description, :users, :userName)");
	
	//Assign vars and wash those bad characters away!
	$cPic = $sBinaryThumbnail;
	$name = filter_var($_POST['nameOfChallenge'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$points = $_POST['numPoints'];
	$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$users = filter_var($_POST['users'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$userName = $_SESSION['user_session'];
	
	
	//bind
	$stmt->bindParam ( ':cPic', $cPic, PDO::PARAM_LOB );
	$stmt->bindParam ( ':name', $name, PDO::PARAM_STR );
	$stmt->bindParam ( ':points', $points, PDO::PARAM_STR );
	$stmt->bindParam ( ':description', $description, PDO::PARAM_STR );
	$stmt->bindParam ( ':users', $users, PDO::PARAM_STR );
	$stmt->bindParam ( ':userName', $userName, PDO::PARAM_STR );
	
	//execute
	$stmt->execute();
	
	//Clear the connection to the database
	Database::clearDB();
	
	//header( "refresh:0;url=localhost/achieve" );
	header("location:http://localhost/achieve/dashboard");
}catch(Exception $e){
	echo "<br>" . $e->getMessage() . "</b>";
  }
 }
}

//check if the challenge has valid friends
function checkFriends(){
	$tok = trim(strtolower(strtok($_POST['users'], " \n")), " \n");
	while ($tok !== false) {
		$array[]=trim(strtolower($tok), " \n");
		$tok = strtok(" \n\t");
	}
	
	//get the friends for the user
	$str= GetFriends::getAll($_SESSION['user_session']);

	$friends = count($str);
	$challenge = count($array);

	
	for($i=0; $i<$challenge; $i++){
		for($j=0; $j<$friends;$j++){
			if(strcmp($array[$i], $str[$j]) !== 0){
				echo "array=" . trim($array[$i], " \t\n\r\0\x0B") . "   str=" . $str[$j];
				
			}
		}
	}
	
	
	$flag=0;
	foreach($array as $val){
		$val = trim($val, " \n\t");
		if(!in_array($val, $str)){
			$flag = $flag+1;
		}
	}

	//If there was a friend added that is not in users friend list, return 0 and don't submit challenge.  Else, submit challenge.
	if($flag>0){
	 return 1;
	}
	else{
	 return 1;
	}
}

if(isset($_POST['submit'])){
	addChallenge();
 }

	
?>