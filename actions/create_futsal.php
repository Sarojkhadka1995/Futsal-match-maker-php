<?php
session_start();
require_once "../connections/db.php";
//get session detail
$id=$_SESSION['loggedUser'];
$loggedUser_name=$_SESSION['loggedUser_name'];
	//get post data
	$fname=$_POST['futsalname'];
	$venue=$_POST['venue'];
	$open_time=$_POST['opn_time'];
	$close_time=$_POST['cls_time'];
	$price=$_POST['price'];
	$contact=$_POST['contact'];


	$query="SELECT * FROM futsal WHERE fname='$fname' AND location='$venue' ";
	$check_query=mysqli_query($con,$query);
	$result=mysqli_fetch_assoc($check_query);
	if($result){
		header('Refresh:5,URL=../pages/futsal_dashboard.php');
		echo("Insert Failed"."<br>");
		echo("This futsal already exists.");
		echo("<br>"."Redirecting back to dashboard in 5 sec");
	}
	else{
	$query=mysqli_query($con,"INSERT INTO futsal(uid,fname,location,opening_time,closing_time,price,contact) VALUES ($id,'$fname','$venue','$open_time','$close_time','$price','$contact')");
		header('Location:../pages/futsal_dashboard.php');
	// if ($query) {
	// 	$retrive_query=mysqli_query($con,"SELECT * FROM teams WHERE owner_id = $id");
	// 	while($row=mysqli_fetch_assoc($retrive_query)){
	// 	$tid=$row['tid'];
	// 	}
	// 	//die(" Retrive Successfull");
	// 	$update_query=mysqli_query($con,"UPDATE users set tid=$tid where uid IN ($id,$member1,$member2,$member3,$member4)");
	// 	if($update_query){
	//  		header('Location: ../pages/player_dashboard.php');
	//  	}else{
	//  		echo "Update failed.";
	//  	}	
	// } 
	// else{
	// 	echo "Insertion failed";
	// }
	}



?>