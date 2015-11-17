<?php
class GetMaxPoints {
	public function getMax(){
		if(isset($_SESSION['user_session'])){
			//Connect to DB
			$dbh = Database::getDB();
			
			//select rank based off of username set in the session variable
			$stmt =  $dbh->prepare("SELECT rank FROM Users WHERE userName= :user");
			
			//bind params
			$stmt->bindParam ( ':user', $_SESSION['user_session'], PDO::PARAM_STR );
			
			//Execute!
			$stmt->execute();
			
			//set the fetch mode to associative array
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			//get into array
			$array = $stmt->fetch();
			
			//if rank is null, admin is logged in, don't set a max
			if($array['rank']==null){
				echo "";
			}
			else{
				//calc the max number of points they can do, alg can be tweaked if needed
				$max = ($array['rank'] * 10);
				echo $max;
			}
			
			
			//Disconnect from DB
			Database::clearDB();
		}
	}
}

?>