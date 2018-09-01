<?php
  require_once"../../connections/db.php";

  $query=mysqli_query($con,"SELECT * FROM users");


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
					<h1>Users</h1>
				</div>
			</div>
		</div>
	</header>
	<!-- Breadcrumb -->
	<section id="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="admin_dashboard.php">Dashboard</a></li>
				<li class="active"><a href="user.php">Users</a></li>
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
                     Users Management  </a>
               

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">

                       <a  class="list-group-item list-group-item-dark active main-color-bg" href="user.php">Users List</a>
                </div>
             </div>
            </div>

					</div>
				</div>
				<div class="col-lg-9">
					<div class="card">
						<div class="card-header main-color-bg">
							<h4 class="card-title">Users List</h4>
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
											<th>SN</th>
											<th>User Name</th>									
											<th>Contact No</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
											 <?php while($row=mysqli_fetch_assoc($query)) { ?>
											<tr>
												<td><?php echo $row['name']?></td>
												<td><?php echo $row['email']?></td>
												<td><?php echo $row['contact']?></td>
                        						<td><a class="btn btn-secondary" href="javascript:openModal(${v.userId});"
                          						>Edit</a> 
                          						<a
                          					class="btn btn-danger" href="../../actions/delete_user.php?id=<?php echo $row['uid']?>">Delete</a></td>
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

	<!-- Add User Modal -->

	<div class="modal fade" id="addUser" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<form action="user_register" method="POST">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Add User</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&#xD7;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label><b>User Name</b></label> <input type="text"
								name="userName" type="text" class="form-control"
								placeholder="Username">
						</div>
						
						<div class="form-group">
							<label><b>Password</b></label> <input type="password"
								name="password" type="password" class="form-control"
								placeholder="Password">
						</div>
						
						<div class="form-group">
							<label><b>Address</b></label> <input type="text" name="address"
								class="form-control" placeholder="Address">
						</div>

						<div class="form-group">
							<label><b>Email</b></label> <input type="email" name="email"
								class="form-control" placeholder="Email">
						</div>

						<div class="form-group">
							<label><b>Contact No:</b></label> <input type="number"
								name="contactNo" class="form-control"
								placeholder="Contact Number">
						</div>

						<div class="form-group">
							<label><b>Gender:</b></label> <input type="radio" name="gender"
								value="male"> Male <input type="radio" name="gender"
								value="female"> Female
						</div>

						<div class="form-group">
							<label><b>Date Of Birth:</b></label> <input type="date"
								name="dob" class="form-control" placeholder="Date Of Birth">
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit User Modal -->

	<div class="modal fade" id="editUser" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<form id="edit_form" action="user_update" method="POST">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&#xD7;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label><b>ID</b></label> <input id="userId" type="text"
								name="id" readonly="readonly" class="form-control">
						</div>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<label><b>User Name</b></label> <input type="text"
								name="userName" type="text" id="firstName" class="form-control">
						</div>

						<div class="form-group">
							<label><b>Address</b></label> <input type="text" name="address"
								id="address" class="form-control">
						</div>

						<div class="form-group">
							<label><b>Email</b></label> <input type="email" name="email"
								id="email" class="form-control">
						</div>

						<div class="form-group">
							<label><b>Contact No:</b></label> <input type="number"
								id="contactNo" name="contactNo" class="form-control">
						</div>

						<div class="form-group" id="gender">
							<label><b>Gender:</b></label> 
								<input type="radio" id="gender1" name="gender"
								value="male"> Male 
								<input type="radio" id="gender2" name="gender"
								value="female"> Female
						</div>

						<div class="form-group">
							<label><b>Date Of Birth:</b></label> <input type="date"
								id="dateOfBirth" name="dob" class="form-control">
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



