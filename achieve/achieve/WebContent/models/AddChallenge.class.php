<?php
function addChallenge(){
	echo $_POST['nameOfChallenge'] . "<br>";
	echo $_POST['numPoints'] . "<br>";
	echo $_POST['description'] . "<br>";
	echo $_POST['users'] . "<br>";
	
}

if(isset($_POST['submit'])){
	addChallenge();
}
	
?>