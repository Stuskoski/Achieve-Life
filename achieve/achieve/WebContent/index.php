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
		case "logout":
			LogoutController::run();
			break;
		case "setting":
			MasterView::showHeader();
			SettingsController::show();
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
			break;
		case "challenge":
			MasterView::showHeader();
			ChallengeController::show();
			MasterView::showFooter();
			break;
		case "viewchallenges":
			MasterView::showHeader();
			ViewChallengesController::show();
			MasterView::showFooter();
			break;
		case "verifychallenges":
			MasterView::showHeader();
			VerifyChallengesController::show();
			MasterView::showFooter();
			break;
		case "friends":
			MasterView::showHeader();
			FriendsController::show();
			MasterView::showFooter();
			break;
		default:
			MasterView::showHeader();
			DashboardController::show();
			MasterView::showFooter();
	};
?>	
