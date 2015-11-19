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
						<?php echo '<img alt="Challenge Picture" class="challengePic" style="width:60px;height:60px;" src="data:image/jpeg;base64,'.base64_encode( $row['cPic'] ).'"/>';?>
						<?php echo '<div><span class="challengeName">' . $row['name'] . '</span></div>';?>
						<?php echo '<div><span class="challengePoints">' . $row['points'] . '</span></div>';?>
						<?php echo '<div><h4>' . $row['description'] . '</h4></div>';?>
						<?php echo '<a href="models/DeleteChallenge.php?id=' . $row['cid'] . '" class = "delete">Delete</a>' ?>		
					</div>
					
					<?php 
					$ary[]=$row;
					
				}
				
				
				//<?php echo '<div class = "challengeName">' . $row['name'] . '</div>';
				
		
				/***Clear the connection to the database***/
				Database::clearDB();
		
		
		
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
		
		
	}
	
	
	
	
	
	public function verifyC($user){
	
		if(!is_null($user)){
			try{
				//echo $user;
				/*** connect to the database ***/
				$dbh = Database::getDB();
	
	
				/*** The sql statement ***/
				$stmt =  $dbh->prepare("SELECT c.* FROM Challenges c WHERE c.userName = :user");
	
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
							<?php echo '<img alt="Challenge Picture" class="challengePic" style="width:60px;height:60px;" src="data:image/jpeg;base64,'.base64_encode( $row['cPic'] ).'"/>';?>
							<?php echo '<div><span class="challengeName">' . $row['name'] . '</span></div>';?>
							<?php echo '<div><span class="challengePoints">' . $row['points'] . '</span></div>';?>
							<?php echo '<div><span class="challengeDescription">' . $row['description'] . '</span></div>';?>
							<?php echo '<a href="models/VerifyChallenge.php?id=' . $row['cid'] . '" class = "delete">Verify</a>' ?>		
						</div>
						
						<?php 
						$ary[]=$row;
						
					}
					
					
					//<?php echo '<div class = "challengeName">' . $row['name'] . '</div>';
					
			
					/***Clear the connection to the database***/
					Database::clearDB();
			
			
			
				}catch(Exception $e){
					echo $e->getMessage();
				}
			}
			
			
		}
	
	
}
?>