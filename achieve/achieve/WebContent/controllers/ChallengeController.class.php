<?php
class ChallengeController {

	public static function show() {  
		ChallengeView::show();
  	}
  
  	public static function getPic($user){
  		GetProfilePic::getPic($user);
  	}
}
?>