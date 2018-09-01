<?php
include "../connections/db.php";
session_start();
$uid=$_SESSION['loggedUser'];
$query=mysqli_query($con,"SELECT tid from users where uid= '$uid' ");
$result=mysqli_fetch_assoc($query);
$tid=$result['tid'];
//update query after click on notification
$update_query = "UPDATE game SET status=1 WHERE team2='$tid' and status=0";
mysqli_query($con, $update_query);
//request notification
$query1 = mysqli_query ($con,"SELECT * from game where team2=$tid and notify=1 ");
//response notification
$query2 = mysqli_query($con,"SELECT * from game where team1='$tid'"); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Other team</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<script src="../vendor/jquery/jquery.min.js"></script>
	 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	 <link href="../css/blog-home.css" rel="stylesheet">

	
	  
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script>
	  	$(function(){
	  		$("#header").load("../pages/header.php");
	  		$("#sidebar").load("../pages/sidebar.html");
	  	});
	</script>
</head>
<body class="body">
<!-- Navigation header -->
<div id="header"></div>
	<div class="container">
		<div class="row">
			<!--Entries Column -->
  			<div class="col-md-8">
  				<div style="text-align: center">
  					<h4>Game Request</h4>
  				</div>
      			<div class="container">
					<table class="table table-hover">
				      <thead>
				        <tr>
				          <th scope="col">Team Name</th>
				          <th scope="col">Venue</th>
				          <th scole="col">Location</th>
				          <th scope="col">Start time</th>
				          <th scope="col">End time</th>
				          <th scope="col">Action</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php while ($row=mysqli_fetch_assoc($query1)) { ?>
				      	<tr>
				          <td><?php $opp_tid=$row['team1'];
				          $query3=mysqli_query($con,"SELECT team_name from teams where tid='$opp_tid'");
				          $result3=mysqli_fetch_assoc($query3);
				          echo $result3['team_name']; ?></td>
				          <td><?php echo $row['venue'] ;?></td>
				          <td><?php echo $row['location']; ?></td>
				          <td><?php echo $row['start_time'] ;?></td>
				          <td><?php echo $row['end_time'] ;?></td>
				          <td><a href="../actions/cancel_matchreq.php?id=<?php echo $row['tid']; ?>">Cancel</a> | <a href="../actions/accept_matchreq.php?id1=<?php echo $row['tid']; ?>">Accept</a></td>
				        </tr>
				        <?php } ?>
				      </tbody>
				    </table>
				</div>
				<div class="container">
					<div align="center">
						<h4>Game Response</h4>
					</div>
				    <table class="table table-hover">
				    	<thead>
				        <tr>
				          <th scope="col">Team Name</th>
				          <th scope="col">Action</th>
				        </tr>
				      	</thead>
				    	<tbody>
							<?php while ($row2=mysqli_fetch_assoc($query2)) { ?>
							<tr>
								<td><?php $opp_tid=$row2['team2'];
				          		$query4=mysqli_query($con,"SELECT team_name from teams where tid='$opp_tid'");
				          		$result4=mysqli_fetch_assoc($query4);
				          		echo $result4['team_name']; ?></td>
				          	<td><input type="button" class="btn btn-primary view" value="View" id="<?php echo $row['mid']; ?>"><span style="color:blue;" id="Pending"></span></td>		
				          	</tr>
				          	<?php } ?>	    		
				    	</tbody>
				    </table>
				</div>
			</div>
			<div id="sidebar" class="col-md-4"></div>
		</div>
	</div>

<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
	$('.view').click(function(){  
    	var mid = $(this).attr("id");
	    alert("Inside response_notification");
	    $.ajax({
			url:"../actions/fetch_responsenotification.php",
			method:"post",
			data:{
			mid:mid},
			dataType:"json",
			success:function(json){
				if(json.confirm = 0 || json.confirm = 2){
					$('#Pending').html(json.notification);
					$('#book').hide();
				}else{
					$('#Pending').html(json.notification);
					$('#book').fadeIn('slow');
				}
			},error: function(){
				$.alert({
			       title: 'Invalid Number',
			       content: 'Invalid Phone number!',
				})
			}
		});
	}); 
});
</script>
</body>
</html>