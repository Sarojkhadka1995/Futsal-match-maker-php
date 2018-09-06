<?php
include "../connections/db.php";
$gid=$_GET['id'];
$query=mysqli_query($con,"DELETE from game where gid = $gid");
if($query){
	header('Location:../pages/notifygame_response.php?success=1');
}else{
	header('Refresh:5,URL=../pages/notification.php');
	echo "Delete failed"."<br>";
	echo "Redirecting back to login page in 5 sec...";
}
?>
