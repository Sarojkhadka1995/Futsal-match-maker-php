<?php
session_start();
include '../connections/db.php';
$id=$_SESSION['loggedUser'];
//query to check whether user is associated with a team or not
$query=mysqli_query($con,"SELECT tid from users where uid=$id");
$result=mysqli_fetch_assoc($query);
if($result['tid']==0){
	header('Refresh:5,URL=../pages/player_dashboard.php');
	echo("You are not member of any of team");
} else{
	//$query to check whether user is a team owner or not
	$query1=mysqli_query($con,"SELECT tid from teams where owner_id=$id");
	$result1=mysqli_num_rows($query1);
	if($result1>0){
		header('Refresh:5,URL=../pages/player_dashboard.php');
		echo("You are the captain of the team, you cannot leave the team."."<br>"."If you want to leave the team you have to delete it");
	}
	//query to remove user from table members by deleting the users from the table.
	$query2=mysqli_query($con,"DELETE from member where uid=$id");
	//updating users table setting tid to null
	$update_query=mysqli_query($con,"UPDATE users SET tid=0 where uid=$id");
	if($update_query){
	header('Location:../pages/player_dashboard.php');
	}else{
		header('Refresh:5,URL=../pages/player_dashboard.php');
		echo("Failed.");
	}

}
?>