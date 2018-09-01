<?php
session_start();
require_once "../connections/db.php";

//get post data
$teamname=$_POST['teamname'];
$venue=$_POST['venue'];
$s_time=$_POST['s_time'];
$e_time=$_POST['e_time'];
$contact=$_POST['contact'];
$member1=$_POST['member1'];
$member2=$_POST['member2'];
$member3=$_POST['member3'];
$member4=$_POST['member4'];
$members=array($member1,$member2,$member3,$member4);
// ,member1,member2,member3,member4)
// ,$member1,$member2,$member3,$member4)

//get session detail
$id=$_SESSION['loggedUser'];
$loggedUser_name=$_SESSION['loggedUser_name'];

$query=mysqli_query($con,"INSERT INTO teams(owner_id,owner_name,team_name,venue,start_time,end_time,contact)  VALUES ($id,'$loggedUser_name','$teamname','$venue','$s_time','$e_time','$contact')");
if ($query) {
	//retriving tid from created team which is created by current user
	$retrive_query=mysqli_query($con,"SELECT tid FROM teams WHERE owner_id = $id");
	$row=mysqli_fetch_assoc($retrive_query);
	$tid=$row['tid'];
	//die(" Retrive Successfull");
	//inserting into member table
	foreach ($members as $member) {
		$member_insert=mysqli_query($con,"INSERT INTO member(tid,uid) VALUES ($tid,$member) ");
	}

	$update_query=mysqli_query($con,"UPDATE users set tid=$tid where uid IN ($id,$member1,$member2,$member3,$member4)");
	if($update_query){
 		header('Location: ../pages/player_dashboard.php');
 	}else{
 		header('Refresh:5,URL=../pages/player_dashboard.php');
 		echo "Update failed.";
 		echo "Redirecting back to dashboard in 5 sec";
 	}	
} 
else{
	header('Refresh:5,URL=../pages/player_dashboard.php');
	echo "Insertion failed, choose a unique members";
	echo "Redirecting back to dashboard in 5 sec";
}
?>