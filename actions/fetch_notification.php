<?php
include	"../connections/db.php";
session_start();
$uid=$_SESSION['loggedUser'];
$query1=mysqli_query($con,"SELECT tid from users where uid= '$uid' ");
$result=mysqli_fetch_assoc($query1);
$tid=$result['tid'];

if(isset($_POST['view'])){
	// if($_POST["view"] != ''){
	// 	$update_query = "UPDATE game SET status=1 WHERE team2='$tid' and status=0";
	// 	mysqli_query($con, $update_query);
	// }
	$query = mysqli_query ($con,"SELECT mid from game where team2=$tid and status=0 ");
	$count = mysqli_num_rows ($query);
	// echo($count);
	$data = array(
		'unseen_notification' => $count,
	);
	echo json_encode($data);
}


?>
