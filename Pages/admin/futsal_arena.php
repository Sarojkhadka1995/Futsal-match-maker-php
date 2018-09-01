<?php
  require_once"../../connections/db.php";

  $query=mysqli_query($con,"SELECT * FROM futsal");


  include "header.php";
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin Area| Users</title>
<script type="text/javascript">

function openModal(id) {	
    $.ajax({
    	
         url: "http://localhost:8088/FutsalManagementSystem/edit_user/"+id,
         success: function(data) {
         console.log(data)
         document.getElementById("userId").value = id;
         document.getElementById("firstName").value = data.userName;
         document.getElementById("address").value = data.address;
         document.getElementById("contactNo").value = data.contactNo;
         document.getElementById("email").value = data.email;
         document.getElementById("dateOfBirth").value = data.dob;
         
         var gender = document.getElementById('gender').value=data.gender;
       
        if(gender == "male") {
        	 gender= document.getElementById("gender1").checked=true;
        	 console.log(gender1);
         } else if(gender == "female") {
        	 gender= document.getElementById("gender2").checked=true;
         }
       
         console.log(JSON.stringify(data));
          $("#editUser").modal("show");            
        }   	 
        });
    }
</script>
</head>

<body>
	<!-- Header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-10">
					<h1>Futsal Arenas</h1>
				</div>
			</div>
		</div>
	</header>
	<!-- Breadcrumb -->
	<section id="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="admin_dashboard.php">Dashboard</a></li>
				<li class="active"><a href="futsal_arena.php">Futsal Arenas</a></li>
			</ol>
		</div>
	</section>

	<section id="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="list-group">
						<a href="admin_dashboard.php" class="list-group-item list-group-item-action">
							Dashboard</a> 
	<!-- Dropdown-->
            <div class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" class="list-group-item list-group-item-action" href="#dropdown-lvl1">
                     Futsal Arena Management  </a>
               

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">

                       <a  class="list-group-item list-group-item-dark active main-color-bg" href="futsal_arena.php">Arena List</a>
                </div>
             </div>
            </div>

					</div>
				</div>
				<div class="col-lg-9">
					<div class="card">
						<div class="card-header main-color-bg">
							<h4 class="card-title">Futsal Arenas List</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<input class="form-control" type="text"
										placeholder="filter User....">
								</div>
							</div>
							<br>
							
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Futsal Name</th>									
											<th>Location</th>
											<th>Opening Time</th>
											<th>Closing Time</th>
											<th>Contact</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
											 <?php while($row=mysqli_fetch_assoc($query)) { ?>
											<tr>
												<td><?php echo $row['fname']?></td>
												<td><?php echo $row['location']?></td>
												<td><?php echo $row['opening_time']?></td>
												<td><?php echo $row['closing_time']?></td>
												<td><?php echo $row['contact']?></td>

                        						<td><a class="btn btn-secondary" href="javascript:openModal(${v.userId});"
                          						>Edit</a> 
                          						<a
                          					class="btn btn-danger" href="../../actions/delete_arena.php?id=<?php echo $row['fid']?>">Delete</a></td>
											</tr>
                   						 <?php } ?>
									</tbody>
								</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- Footer -->
	<footer id="footer">
		<p>Copyright AdminSpace, &copy; 2018</p>
	</footer>