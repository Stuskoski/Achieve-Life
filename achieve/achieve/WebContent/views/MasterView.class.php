<?php
ob_start();
session_start();
class MasterView {
  public static function showHeader() {  		
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
<!-- Favicon Icon -->
<link rel="icon" href="assets/img/favicon.ico" />
<title>Joust</title>
<!-- BOOTSTRAP CORE CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- ION ICONS STYLES -->
<link href="assets/css/ionicons.css" rel="stylesheet" />
<!-- FONT AWESOME ICONS STYLES -->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM CSS -->
<link href="assets/css/style.css" rel="stylesheet" />
<!-- IE10 viewport hack  -->
<script src="assets/js/ie-10-view-port.js"></script>
<!-- GOOGLE FONT LINK -->
<link href='https://fonts.googleapis.com/css?family=Metamorphous' rel='stylesheet' type='text/css'>
<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- HEADER SECTION START-->
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 logo-wrapper">
					<a href="dashboard"><img src="assets/img/joustTemp.png" alt="" /></a>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-4 col-xs-0"></div>
				<div class="col-lg-3 col-md-5 col-sm-6 col-xs-10">
					<div class="menu-links scroll-me">
						<a href="dashboard"> <i class="ion-ios-list-outline"></i>
						</a> <a href="setting"> <i class="ion-ios-gear-outline"></i>
						</a> <a href="challenge"> <i class="ion-ios-game-controller-b-outline"></i>
						</a> <a href="guild"> <i class="ion-beer"></i>
						</a> <a href="friends"> <i class="ion-ios-people-outline"></i>
						<?php if(isset($_SESSION['user_session'])){?>
						</a> <a href="logout"> <i class="ion-ios-close-outline exit"></i>
						<?php }?>
						</a>
					</div>
				</div>
				<div class="col-lg-0 col-md-0 col-sm-0 col-xs-0"></div>
			</div>
		</div>
	</header>
	<!-- HEADER SECTION END-->
<?php 
  }
  
  public static function showFooter() {
  	?>
	<!-- FOOTER SECTION START-->
	<footer>
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-12 col-md-12 col-sm-12">
					&copy; 2015 Joust.com | by Augustus Rutkoski, Michael Murata, Sean Butcher.
				</div>

			</div>
		</div>
	</footer>
	<!-- FOOTER SECTION END-->

	<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
	<!-- CORE JQUERY  SCRIPTS -->
	<script src="assets/js/jquery-1.11.1.js"></script>
	<!-- BOOTSTRAP SCRIPTS  -->
	<script src="assets/js/bootstrap.js"></script>
	<!-- SCROLLING SCRIPTS PLUGIN  -->
	<script src="assets/js/jquery.easing.min.js"></script>
	<!-- CUSTOM SCRIPTS   -->
	<script src="assets/js/custom.js"></script>
</body>
</html>
 <?php
  }
  
  
  

  
  public static function showHeader2() {
  	?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8" />
  <meta name="viewport"
  	content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!--[if IE]>
          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
          <![endif]-->
  <!-- Favicon Icon -->
  <link rel="icon" href="../assets/img/favicon.ico" />
  <title>Joust</title>
  <!-- BOOTSTRAP CORE CSS -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <!-- ION ICONS STYLES -->
  <link href="../assets/css/ionicons.css" rel="stylesheet" />
  <!-- FONT AWESOME ICONS STYLES -->
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM CSS -->
  <link href="../assets/css/style.css" rel="stylesheet" />
  <!-- IE10 viewport hack  -->
  <script src="../assets/js/ie-10-view-port.js"></script>
  <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
  
  <!-- HEADER SECTION START-->
  	<header id="header">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 logo-wrapper">
  					<a href="../dashboard"><img src="../assets/img/joustTemp.png" alt="" /></a>
  				</div>
  				<div class="col-lg-6 col-md-5 col-sm-4 col-xs-0"></div>
  				<div class="col-lg-3 col-md-5 col-sm-6 col-xs-10">
  					<div class="menu-links scroll-me">
  						<a href="../dashboard"> <i class="ion-ios-list-outline"></i>
  						</a> <a href="../setting"> <i class="ion-ios-gear-outline"></i>
  						</a> <a href="../challenge"> <i class="ion-ios-game-controller-b-outline"></i>
  						</a> <a href="../guild"> <i class="ion-beer"></i>
  						</a> <a href="friends"> <i class="ion-ios-people-outline"></i>
  						<?php if(isset($_SESSION['user_session'])){?>
  						</a> <a href="../logout"> <i class="ion-ios-close-outline exit"></i>
  						<?php }?>
  						</a>
  					</div>
  				</div>
  				<div class="col-lg-0 col-md-0 col-sm-0 col-xs-0"></div>
  			</div>
  		</div>
  	</header>
  	<!-- HEADER SECTION END-->
  <?php 
    }
    
    public static function showFooter2() {
    	?>
  	<!-- FOOTER SECTION START-->
  	<footer>
  		<div class="container">
  			<div class="row text-center">
  				<div class="col-lg-12 col-md-12 col-sm-12">
  					&copy; 2015 Joust.com | by Augustus Rutkoski, Michael Murata, Sean Butcher.
  				</div>
  
  			</div>
  		</div>
  	</footer>
  	<!-- FOOTER SECTION END-->
  
  	<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
  	<!-- CORE JQUERY  SCRIPTS -->
  	<script src="../assets/js/jquery-1.11.1.js"></script>
  	<!-- BOOTSTRAP SCRIPTS  -->
  	<script src="../assets/js/bootstrap.js"></script>
  	<!-- SCROLLING SCRIPTS PLUGIN  -->
  	<script src="../assets/js/jquery.easing.min.js"></script>
  	<!-- CUSTOM SCRIPTS   -->
  	<script src="../assets/js/custom.js"></script>
  </body>
  </html>
   <?php
    }
  
  
  
}


?>
