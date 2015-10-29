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
			MasterView::showHeader();
			LoginController::show();
			MasterView::showFooter();
			break;
		case "settings":
			SettingsController::show();
			break;
		case "dashboard":
			MasterView::showHeader();
			DashboardController::show();
			MasterView::showFooter();
			break;
		case "signup":
			MasterView::showHeader();
			SignupController::show();
			MasterView::showFooter();
			break;
		case "guild":
			MasterView::showHeader();
			GuildController::show();
			MasterView::showFooter();
		default:
			MasterView::showHeader();
			LoginController::show();
			MasterView::showFooter();
	};
?>	
