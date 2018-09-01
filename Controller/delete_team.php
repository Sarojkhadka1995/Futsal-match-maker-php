<?php
session_start();
include "../connections/db.php";
$id=$_SESSION['loggedUser'];
//query to check if there is any team with tid set, whose owner is current user 
$query=mysqli_query($con,"SELECT tid from teams where owner_id=$id");
$result=mysqli_fetch_assoc($query);
$tid=$result['tid'];
if($result['tid']>0){
	//update users table entry set tid as null
	$update_query=mysqli_query($con,"UPDATE users SET tid=0 where uid=$id");
	//query to delete row from teams table
	$del_query=mysqli_query($con,"DELETE from teams where owner_id=$id");
	if($del_query){
		//deleting entries of member table
		$del_query1=mysqli_query($con,"DELETE from member where tid=$tid");
		if($del_query1){
			header('URL=../pages/player_dashboard.php');
		}
		else{
			header('Refresh:5,URL=../pages/player_dashboard.php');
			echo("Failed to delete member table");	
		}
	}else{
		header('Refresh:5,URL=../pages/player_dashboard.php');
		echo("Failed to delete record from teams table");
	}
}else{
	header('Refresh:5,URL=../pages/player_dashboard.php');
	echo("You are not a team captain, you cannot delete a team");
}