<?php
class GetProfilePic{
	public static function getPic($user){
	try{
		//connect to DB, AIM
		$dbh = Database::getDB();

		//select the img based on the user named passed, SET
		$stmt =  $dbh->prepare("SELECT pPic FROM Users WHERE userName= :user");
		
		//bind
		$stmt->bindParam ( ':user', $user, PDO::PARAM_STR );
		
		//FIRE!
		$stmt->execute();
		
		//set the fetch mode to associative array
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		//get into array
		$array = $stmt->fetch();
		
		/*** check we have a single image and type ***/
		if(sizeof($array) == 1)
		{
			/*** set the headers and display the image ***/
			//header("Content-type: ".$array['image_type']);
			echo '<img alt="Profile Picture" style="width:125px;height:125px;" src="data:image/jpeg;base64,'.base64_encode( $array['pPic'] ).'"/>';
			//echo '<input type ="image" name="thumbnail" value="myval" alt="Profile Picture" style="width:105px;height:130px;" src="data:image/jpeg;base64,'.base64_encode( $array['image'] ).'"/>';
		
			/*** output the image ***/
			//echo $array['image'];
		}
		else
		{
			echo '<img src ="assets/img/generic.png" alt="Profile Picture" style="width:135px;height:135px;">';
		}
		
	}catch(Exception $e){
		echo "<br>" . $e->getMessage() . "</b>";	
	}
  }
}