<?php
include "../connections/db.php";
session_start();
$id=$_SESSION['loggedUser'];
$query1=mysqli_query($con,"SELECT tid from users where uid='$id' ");
$result=mysqli_fetch_assoc($query1);
$tid1=$result['tid'];
if(isset($_POST["matchcreator"])){
	//opponent team id retrived from submit match from which is set in url when users click play match after search
	$tid2=$_POST['tid2'];
	echo ($tid1."<br>".$tid2);
	$venue=$_POST['fname'];
	$location=$_POST['location'];
	$s_time=$_POST['s_time'];
	$e_time=$_POST['e_time']; 
	$date=$_POST['date'];

	$query=mysqli_query($con,"INSERT INTO game(team1,team2,confirm,venue,location,start_time,end_time,gdate,notify,status) VALUES('$tid1' , '$tid2' , 'No' , '$venue' , '$location' , '$s_time' , '$e_time' , '$date',1,0)");
	if($query){
		header('Location:../pages/player_dashboard.php?matchreq=1');
	}else{
		header('Location:../pages/player_dashboard.php?err_matchreq=1');;
	}
}
?>
