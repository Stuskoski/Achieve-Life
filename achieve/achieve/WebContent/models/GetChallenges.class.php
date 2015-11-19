<?php
class GetChallenges{
	public function getC($user){
		
		if(!is_null($user)){
			try{
				//echo $user;
				/*** connect to the database ***/
				$dbh = Database::getDB();
		
		
				/*** The sql statement ***/
				$stmt =  $dbh->prepare("SELECT c.* FROM Challenges c JOIN Challengeuser u ON c.cid=u.cid WHERE u.user1 = :user");
		
				/*** Bind params ***/
				$stmt->bindParam ( ':user', $user, PDO::PARAM_STR );
		
				/*** exceute the query ***/
				$stmt->execute();
		
				/*** set the fetch mode to associative array ***/
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
				/*** set the header for the image ***/
				//$array = $stmt->fetch();
		
				/***Parse through the list***/
				while ($row = $stmt->fetch()) {
					?>
					<div class="container display-challenges">
						<?php echo '<img alt="Challenge Picture" style="width:60px;height:60px;" src="data:image/jpeg;base64,'.base64_encode( $row['cPic'] ).'"/>';?>
						<?php echo $row['name'];?>
						<?php echo $row['points'];?>
						<?php echo $row['description'];?>
						<?php echo $row['users'];?>		
					</div>
					
					<?php 
					$ary[]=$row;
					
				}
				
				

				
		
				/***Clear the connection to the database***/
				Database::clearDB();
		
		
		
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
		
		
	}
}
?>