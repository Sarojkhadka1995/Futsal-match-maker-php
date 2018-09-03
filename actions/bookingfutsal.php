<?php
include '../connections/db.php';
session_start();
if(isset($_POST['bookfutsal'])){
	$id=$_SESSION['loggedUser'];
	$fid=$_POST['fid'];
	$owner_query=mysqli_query($con,"SELECT uid from futsal where fid=$fid ");
	$result=mysqli_fetch_assoc($owner_query);
	$owner_id=$result['uid'];

	//$query to check bank acount
	$query_bank=mysqli_query($con,"SELECT bnk_id from bank where uid=$id or uid=$owner_id");
	if(mysqli_num_rows($query_bank)==0){
		header('Location:../pages/bookfutsal1.php?bank_err=1');
	}else{
		$bid=$_POST['bid'];
		$s_time=$_POST['s_time'];
		$e_time=$_POST['e_time'];
		$day=$_POST['day'];
		$query=mysqli_query($con,"SELECT * from booking_details where bid=$bid and s_time='$s_time' and e_time='$e_time' and day='$day' ");
		if(!$query){
			echo ("Search query failed.");
		}else{
			$row_count=mysqli_num_rows($query);
			if($row_count>0){
				header('Location:../pages/bookfutsal1.php?book_err=1');
			}else{
				$insert_query=mysqli_query($con,"INSERT INTO booking_details(bid,uid,s_time,e_time,day) VALUES($bid,$id,'$s_time','$e_time','$day')");
				if($insert_query){
					if(!$id==$owner_id){
						//to update bank we need owner id or uid of futsal owner
						//querying bank updating data of current user to transfer money
						$bank_query1=mysqli_query($con,"UPDATE bank set amount=amount-500 where uid=$id");
						//querying bank updating data of current user to transfer money
						$bank_query2=mysqli_query($con,"UPDATE bank set amount=amount+500 where uid=$owner_id");
						header('Location:../pages/bookfutsal1.php?transc_success=1');
					}
				header('Location:../pages/bookfutsal1.php?book_success=1');
				}else{
					header('Locatoin:../pages/bookfutsal1.php?insert_err=1');
				}
			}
		}
	}
}
?>