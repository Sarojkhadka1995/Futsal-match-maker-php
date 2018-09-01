<?php
  require_once"../../connections/db.php";

  $query=mysqli_query($con,"SELECT * FROM users where type='futsal'");
  $result=mysqli_fetch_assoc($query);
  $uid=$result['uid'];

  $query1=mysqli_query($con, "SELECT * FROM futsal where uid='$uid'");
  



  include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Admin Area| owners</title>
<script type="text/javascript">

function openModal(id) {
	
	$.ajax({
        url: "http://localhost:8080/FutsalManagementSystem/edit_owner/"+id,
        success: function(data) {
        	 document.getElementById("ownerId").value = id;
        	 document.getElementById("owner_name").value = data.ownerName;
        	 document.getElementById("field_name").value = data.fieldName;
        	 document.getElementById("location").value = data.location;
        	 document.getElementById("price").value = data.price;
        	 document.getElementById("contact_no").value = data.contactNo;
         console.log(JSON.stringify(data));
          $("#editOwner").modal("show");
            
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
					<h1>Futsal Owners</h1>
				</div>
			</div>
		</div>
	</header>
	<!-- Breadcrumb -->
	<section id="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="admin_dashboard.php">Dashboard</a></li>
				<li class="active"><a href="owner.php">Owners</a></li>
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
                     Futsal Owner Management  </a>
               

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                       <a  class="list-group-item list-group-item-dark active main-color-bg" href="owner.php">Owner List</a>
                </div>
             </div>
            </div>

					</div>
				</div>
				<div class="col-lg-9">
					<div class="card">
						<div class="card-header main-color-bg">
							<h4 class="card-title">Owners List</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<input class="form-control" type="text"
										placeholder="filter Owner....">
								</div>
							</div>
							<br>
							<c:if test="${!empty owners}">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Name</th>
											<th>Contact</th>
											<th>Futsal Name</th>
											<th>Location</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
										<?php while($row=mysqli_fetch_assoc($query)) { ?>
											<tr>
												<td><?php echo $result['name']?></td>
												<td><?php echo $result['contact']?></td>

												<?php }?>

											<?php while($row=mysqli_fetch_assoc($query1)){ ?>

												<td><?php echo $row['fname'];?></td>
												<td><?php echo $row['location'];?></td>
                        						<td><a class="btn btn-secondary" href="javascript:openModal(${v.userId});"
                          						>Edit</a> 
                          						<a
                          					class="btn btn-danger" href="../../actions/delete_owner.php?id=<?php echo $row['uid']?>">Delete</a></td>
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
</body>
</html>