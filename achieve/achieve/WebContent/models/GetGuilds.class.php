<?php
class GetGuilds{
	public function getC($user){
		
		if(!is_null($user)){
			try{
				//echo $user;
				/*** connect to the database ***/
				$dbh = Database::getDB();
		
		
				/*** The sql statement ***/
				$stmt =  $dbh->prepare("SELECT * FROM Guilds c WHERE user = :user");
		
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
					<div class="container display-guilds">
						<?php echo '<div><span class="guildName">' . $row['name'] . '</span></div>';?>
						<?php echo '<div><span class="guildPoints">' . $row['points'] . '</span></div>';?>
						<?php echo '<div><h4>' . $row['description'] . '</h4></div>';?>
						<?php echo '<a href="models/DeleteGuild.php?id=' . $row['cid'] . '" class = "delete">Delete</a>' ?>		
					</div>
					
					<?php 
					$ary[]=$row;
					
				}
				
				
				//<?php echo '<div class = "guildName">' . $row['name'] . '</div>';
				
		
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
				$stmt =  $dbh->prepare("SELECT c.* FROM Guilds c WHERE c.userName = :user");
	
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
						<div class="container display-guilds">
							<?php echo '<div><span class="guildName">' . $row['name'] . '</span></div>';?>
							<?php echo '<div><span class="guildDescription">' . $row['description'] . '</span></div>';?>
							<?php echo '<a href="models/VerifyGuild.php?id=' . $row['cid'] . '" class = "delete">Verify</a>' ?>		
						</div>
						
						<?php 
						$ary[]=$row;
						
					}
					
					
					//<?php echo '<div class = "guildName">' . $row['name'] . '</div>';
					
			
					/***Clear the connection to the database***/
					Database::clearDB();
			
			
			
				}catch(Exception $e){
					echo $e->getMessage();
				}
			}
			
			
		}
	
	
}
?>