<?php 
include_once "../connections/db.php";
session_start();
$id=$_SESSION['loggedUser'];
$query=mysqli_query($con,"SELECT tid from users where uid=$id");
$result=mysqli_fetch_assoc($query);
$tid=$result['tid'];
$query=mysqli_query($con,"SELECT * from teams where tid !='$tid' ");
?>
<!DOCTYPE html>
<html>
<head>
<title>Other team</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	 <link href="../css/blog-home.css" rel="stylesheet">

	
	  
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script>
	  	$(function(){
	  		$("#header").load("header.php");
	  		$("#sidebar").load("sidebar.html");
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
  				<ul class="list-group list-group-flush">
      				<li class="list-group-item body">All Other Teams</li>
      			</ul>
      			<div class="container">
					<table class="table table-hover">
				      <thead>
				        <tr>
				          <th scope="col">Team Name</th>
				          <th scope="col">Preferred Venue</th>
				          <th scope="col">Preferred Time</th>
				          <th scope="col">Contact</th>
				          <th scope="col">Action</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php while ($row=mysqli_fetch_assoc($query)) { ?>
				      	<tr>
				          <td><?php echo $row['team_name'] ;?></td>
				          <td><?php echo $row['venue'] ;?></td>
				          <td><?php echo $row['preferred_time'] ;?></td>
				          <td><?php echo $row['contact'] ;?></td>
				          <td><a href="../pages/viewteam.php?id=<?php echo $row['tid']; ?>">View</a> | <a href="submit_matchreq.php?id1=<?php echo $row['tid']; ?>">Play</a></td>
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


</body>
</html>