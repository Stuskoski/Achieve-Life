<?php
include_once("../models/Database.class.php");

/*** some basic sanity checks ***/
if(true)
//if(filter_has_var(INPUT_GET, "image_id") !== false && filter_input(INPUT_GET, 'image_id', FILTER_VALIDATE_INT) !== false)
{
	/*** assign the image id ***/
	$image_id = 1;
	//$image_id = filter_input(INPUT_GET, "image_id", FILTER_SANITIZE_NUMBER_INT);
	try     {
		/*** connect to the database ***/
		$dbh = Database::getDB();
		

		/*** The sql statement ***/
		$stmt =  $dbh->prepare("SELECT image, image_type FROM picture WHERE image_id=$image_id");

		/*** exceute the query ***/
		$stmt->execute();

		/*** set the fetch mode to associative array ***/
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		/*** set the header for the image ***/
		$array = $stmt->fetch();
		
		
		/*** check we have a single image and type ***/
		if(sizeof($array) == 2)
		{
			/*** set the headers and display the image ***/
			//header("Content-type: ".$array['image_type']);
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $array['image'] ).'"/>';

			/*** output the image ***/
			//echo $array['image'];
		}
		else
		{
			throw new Exception("Out of bounds Error");
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
}
else
{
	echo 'Please use a real id number';
}



?>