<?php
session_start();
include '../connections/db.php';
$id=$_SESSION['loggedUser'];
$query=mysqli_query($con,"SELECT tid from users where uid=$id");
$result=mysqli_fetch_assoc($query);
$tid=$result['tid'];
if(isset($_GET['id1'])){
	$id1=$_GET['id1'];
	if($tid==0){
		header('Location:../pages/allteam.php?err_matchreq=1');
		//echo("You are not associated with any team, you cannot create match");
	}else{
		$url="../pages/submit_matchreq.php?id1=$id1";
		header("Location:".$url);
	}
}else{
	if($tid==0){
		header('Location:../pages/player_dashboard.php?err_myteam=1');
		//echo("You are not in any team.");
	}else{
		header('Location:../pages/myteam.php');
	}
}
?>