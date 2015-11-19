<?php
class ViewChallengesController {

	public static function show() {  
		ViewChallengesView::show();
  	}
  
  	public static function getPic($user){
  		GetProfilePic::getPic($user);
  	}
}
?>