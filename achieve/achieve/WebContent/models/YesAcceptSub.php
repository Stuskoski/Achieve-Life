<?php
require_once 'Database.class.php';

if(!isset($_SESSION['user_session'])){
	//header("location: ../dashboard");
}

//get ID from get
$id = $_GET['id'];
$id = filter_var($id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//get rid of wildcards
if($id=="*"){
	//header("location: ../dashboard");
}

$dbh = Database::getDB();

//get the information about the submission and challenge
$qry1 = $dbh->prepare("SELECT c.points, s.user1, c.cid
		               FROM submissions s
					   INNER JOIN
					   challenges c 
					   ON s.cid=c.cid
					   WHERE s.sid = :id");

//bind the params
$qry1->bindParam ( ':id', $id, PDO::PARAM_INT );

//execute
$qry1->execute ();

//get the info
$info = $qry1->fetch ( PDO::FETCH_ASSOC );

//add points to correct user
$qry2 = $dbh->prepare("UPDATE Users
					   SET points = (points + :points)
					   WHERE userName = :userName");

//bind the params
$qry2->bindParam ( ':points', $info['points'], PDO::PARAM_INT );
$qry2->bindParam ( ':userName', $info['user1'], PDO::PARAM_STR );

//execute
$qry2->execute ();


//delete the submissions, and challenge
$qry3 = $dbh->prepare("DELETE
					   FROM Submissions
					   WHERE cid =:cid");

//get the cid from an earlier qry and use that to delete all the submissions
$qry3->bindParam ( ':cid', $info['cid'], PDO::PARAM_STR );

//execute
$qry3->execute ();

//delete the challenge users
$qry4 = $dbh->prepare("DELETE
					   FROM Challengeuser
					   WHERE cid =:cid");

//get the cid from an earlier qry and use that to delete all the challenge users
$qry4->bindParam ( ':cid', $info['cid'], PDO::PARAM_STR );

//execute
$qry4->execute ();


//finally, delete the challenge
$qry5 = $dbh->prepare("DELETE
					   FROM Challenges
					   WHERE cid =:cid");

//get the cid from an earlier qry and use that to delete the root challenge
$qry5->bindParam ( ':cid', $info['cid'], PDO::PARAM_STR );

//execute
$qry5->execute ();




Database::clearDB();

header("location: ../verifychallenges");
?>