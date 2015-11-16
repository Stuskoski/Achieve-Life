<?php 
include_once("../models/Database.class.php");
?>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="500" />
    <div><input name="userfile" type="file" /></div>
    <div><input type="submit" value="Submit" /></div>
</form>


<?php

if(!isset($_FILES['userfile']))
{
	echo '<p>Please select a file</p>';
}
else
{
	try    {
		upload();
		/*** give praise and thanks to the php gods ***/
		echo '<p>Thank you for submitting</p>';
	}
	catch(Exception $e)
	{
		echo '<h4>'.$e->getMessage().'</h4>';
	}
}



function upload(){
	
	
	
	
	
}






//SQL injection defense
$image = addslashes($_FILES['image']);

//Get name
$image_name = addslashes($_FILES['image']['name']);

//Insert into DB
$stmt = "INSERT INTO `product_images` (`id`, `image`, `image_name`) VALUES ('1', '{$image}', '{$image_name}')";

$stmt = $dbh->prepare ( "INSERT INTO 'achievelife' userName FROM Admins
        						   WHERE email = :email AND password = :password" );

$stmt = $dbh->prepare("INSERT INTO admins (pPic, pPicName)
						   VALUES (data, 'kalitsa')");

//Get database
$dbh = Database::getDB();



?>
