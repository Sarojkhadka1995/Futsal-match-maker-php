<?php
session_start();
require_once "../connections/db.php";

//get post data
$teamname=$_POST['teamname'];
$venue=$_POST['venue'];
$time=$_POST['time'];

$contact=$_POST['contact'];
$member1=$_POST['member1'];
$member2=$_POST['member2'];
$member3=$_POST['member3'];
$member4=$_POST['member4'];

//get session detail
$id=$_SESSION['loggedUser'];
$loggedUser_name=$_SESSION['loggedUser_name'];
echo $id."<br>".$loggedUser_name;

$query=mysqli_query($con,"INSERT INTO teams(owner_id,owner_name,team_name,venue,preferred_time,contact,member1,member2,member3,member4) VALUES ($id,'$loggedUser_name','$teamname','$venue','$time','$contact',$member1,$member2,$member3,$member4)");
if ($query) {
	$retrive_query=mysqli_query($con,"SELECT * FROM teams WHERE owner_id = $id");
	while($row=mysqli_fetch_assoc($retrive_query)){
	$tid=$row['tid'];
	}
	//die(" Retrive Successfull");
	$update_query=mysqli_query($con,"UPDATE users set tid=$tid where uid IN ($id,$member1,$member2,$member3,$member4)");
	if($update_query){
 		header('Location: ../pages/player_dashboard.php');
 	}else{
 		echo "Update failed.";
 	}	
} 
else{
	echo "Insertion failed";
}
?>