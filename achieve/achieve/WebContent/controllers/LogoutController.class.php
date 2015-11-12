<?php
class LogoutController {

	public static function run() {
			session_start();
			session_unset();
			session_destroy();
			$_SESSION['user_session'] = false;
			header("Location:dashboard");
			//LogoutView::show();
	}
}
?>