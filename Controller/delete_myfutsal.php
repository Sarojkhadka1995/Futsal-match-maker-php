<?php
session_start();
include "../connections/db.php";
$id=$_SESSION['loggedUser'];

$query=mysqli_query($con,"SELECT fid from futsal where uid=$id");
$result=mysqli_fetch_assoc($query);
if($result['fid']>0){
	$fid=$result['fid'];
	//delete futsal query
	$del_query=mysqli_query($con,"DELETE from futsal where fid=$fid");
	if($del_query){
		header("Location:../pages/futsal_dashboard.php?del_success=1");
	}else{
		header('Location:../pages/futsal_dashboard.php?del_err=1');
	}
}else{
	header('Location:../pages/futsal_dashboard.php?err_myfutsal=1');
}
?>