<?php
	include("includer.php");   
	$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	//echo "URL: $url <br>";
	$urlPieces = split("/", $url);
	
	//print_r($urlPieces);
	echo "<br>";
	if (count($urlPieces) < 2)
		$control = "none";
	else 
		$control = $urlPieces[2];
	//echo "Control: $control <br>";
	
	switch ($control) {
		case "login":
			LoginController::show();
			break;
		case "settings":
			SettingsController::show();
			break;
		case "profile":
			ProfileController::show();
			break;
		default:
			LoginController::show();
	};
?>	