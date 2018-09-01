<?php
include "../connections/db.php";
$gid=$_GET['id1'];
$query=mysqli_query($con,"UPDATE game SET confirm=1 , notify=0 where gid=$gid");
if($query){
	header('Location:../pages/notification.php');
}else{
	header('Refresh:5,URL=../pages/notification.php');
	echo "Accept failed"."<br>";
	echo "Redirecting back to login page in 5 sec...";
}
?>
