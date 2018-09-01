<?php
  require_once"../../connections/db.php";

  $query=mysqli_query($con,"SELECT * FROM users");


  include "header.php";
?>
<!Doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Area| Dashboard</title>    

  </head>

<body>

<!-- Header -->
     <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                     <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Breadcrumb -->
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>
    
    <section id="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                 <a href="dashboard" class="list-group-item list-group-item-action active main-color-bg">
					 Dashboard</a>
					
	 <!-- Dropdown User-->
            <div class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" class="list-group-item list-group-item-action" href="#dropdown-user">
                     Users Management  </a>
               

                <!-- Dropdown level 1 -->
                <div id="dropdown-user" class="panel-collapse collapse">
                    <div class="panel-body">
                       <a  class="list-group-item list-group-item-dark" href="user.php">Users List</a>
                </div>
             </div>
            </div>
            
          <!-- Dropdown Owner-->
          <div class="panel panel-default" id="dropdown">
              <a data-toggle="collapse" class="list-group-item list-group-item-action" href="#dropdown-owner">
                   Futsal Owner Management  </a>
             

              <!-- Dropdown level 1 -->
              <div id="dropdown-owner" class="panel-collapse collapse">
                  <div class="panel-body">
                     <a  class="list-group-item list-group-item-dark" href="owner.php">Owner List</a>
              </div>
           </div>
            
       <!-- Dropdown Team-->
            <div class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" class="list-group-item list-group-item-action" href="#dropdown-team">
                     Teams Management  </a>
               

                <!-- Dropdown level 1 -->
                <div id="dropdown-team" class="panel-collapse collapse">
                    <div class="panel-body">             
                       <a  class="list-group-item list-group-item-dark" href="team.php">Team List</a>
                </div>
             </div>
            </div>

               <!-- Dropdown Team-->
            <div class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" class="list-group-item list-group-item-action" href="#dropdown-arena">
                     Futsal Arena Management  </a>
               

                <!-- Dropdown level 1 -->
                <div id="dropdown-arena" class="panel-collapse collapse">
                    <div class="panel-body">             
                       <a  class="list-group-item list-group-item-dark" href="futsal_arena.php">Arena List</a>
                </div>
             </div>
            </div>
            
         
            </div>
					
          </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header main-color-bg">
                         <h4 class="card-title">Website Overview</h4>
                    </div>
                    <div class="card-body">
                     <div class="row">
                        <div class="col-lg-3">
                            <div class="card bg-light card-body mb-3">
							     <h3><i class="fas fa-users"></i> 203</h3>
							     <h4>Team</h4>
							</div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card bg-light card-body mb-3">
                                 <h3><i class="far fa-file-alt"></i> 203</h3>
                                 <h4>Pages</h4>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card bg-light card-body mb-3">
                                 <h3><i class= "fas fa-chart-line"></i> 12,003</h3>
                                 <h4>Visitors</h4>
                            </div>
                        </div>
                         <div class="col-lg-3">
                            <div class="card bg-light card-body mb-3">
                                 <h3><i class="fas fa-user"></i> 203</h3>
                                 <h4>Users</h4>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
          
            <!--  Latest Users -->
            
            <div class="card">
			    <div class="card-header">
			         <h4 class="card-title">Latest Users</h4>
			    </div>
			    <div class="card-body">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>User Name</th>											
											<th>email</th>
											<th>Contact No</th>								
										</tr>
									</thead>
								
									<tbody>
                    <?php while($row=mysqli_fetch_assoc($query)) { ?>
											<tr>
												<td><?php echo $row['name']?></td>
												<td><?php echo $row['email']?></td>
												<td><?php echo $row['contact']?></td>
                    <?php } ?>
									</tbody>
									
						</table>
						</c:if>
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

<!-- User Modal -->
	
	<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
         <form action="user_register" method="POST">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
              	<label><b>User Name</b></label>
              	<input type="text" name="userName" type="text" class="form-control" placeholder="Username">
              	<span id= "err" style="color:red;"></span>
              </div>
              
              <div class="form-group">
              	<label><b>Address</b></label>
              	<input type="text" name="address" class="form-control" placeholder="Address">
              </div>
              
              <div class="form-group">
              	<label><b>Email</b></label>
              	<input type="email" name="email" id="email" class="form-control" placeholder="someone@something.com">
              	<span id='err3' style="color:red;"></span>
              </div>
              
              <div class="form-group">
              	<label><b>Password</b></label>
              	<input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              
              <div class="form-group">
              	<label><b>Contact No:</b></label>
              	<input type="number" name="contactNo"  id="contact" class="form-control" placeholder="+977-XXXXXXXXXX">
              </div>
              
              <div class="form-group">
              	<label><b>Gender:</b></label>
              	<input type="radio" name="gender"
              	 value="male"> Male
              	<input type="radio" name="gender" 
              	value="female"> Female
              </div>
              
              <div class="form-group">
              	<label><b>Date Of Birth:</b></label>
              	<input type="date" name="dob" class="form-control" placeholder="Date Of Birth">
              </div>
		    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
        </div>
    </div>
</div>

	
	<!-- Create Team Modal -->

	<div class="modal fade" id="createTeam" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<form action="team_create" method="POST">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Add Team</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&#xD7;</span>
						</button>
					</div>
					<div class="modal-body">	
								<div class="form-group">				
							<label><b>Team Name</b></label> 
							<select class="form-control" name="teamId">
							<c:forEach var="v" items="${teams}">
							  <option value="${v.teamId}"><c:out value="${v.teamName}"/></option>
							</c:forEach>
							</select>
						</div>
						
						<div class="form-group">
							<label><b>Member 1</b></label> 
							<select class="form-control" name="userId">
							<c:forEach var="u" items="${users}">
							  <option value="${u.userId}"><c:out value="${u.userName}"/></option>
							</c:forEach>
							</select>
						</div>
						
						<div class="form-group">
							<label><b>Member 2</b></label> 
							<select class="form-control" name="userId">
							<c:forEach var="u" items="${users}">
							  <option value="${u.userId}"><c:out value="${u.userName}"/></option>
							</c:forEach>
							</select>							
						</div>
						
						<div class="form-group">
							<label><b>Member 3</b></label> 
							<select class="form-control" name="userId">
							<c:forEach var="u" items="${users}">
							  <option value="${u.userId}"><c:out value="${u.userName}"/></option>
							</c:forEach>
							</select>
						</div>
						
						<div class="form-group">
							<label><b>Preferred Venue</b></label> <input type="text"
								name="preferredVenue" type="text" class="form-control"
								placeholder="Preferred Venue">
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
	
	<!-- Owner Modal -->
	
	<div class="modal fade" id="addOwner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
         <form action="owner_register" method="POST">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add Owner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
              	<label><b>Owner Name</b></label>
              	<input type="text" name="ownerName" type="text" class="form-control" placeholder="Ownername">
              </div>
              
              <div class="form-group">
              	<label><b>Field Name</b></label>
              	<input type="text" name="fieldName" type="text" class="form-control" placeholder="Fieldname">
              </div>
              
              <div class="form-group">
              	<label><b>Location</b></label>
              	<input type="text" name="location" class="form-control" placeholder="Location">
              </div>
              
              <div class="form-group">
              	<label><b>Price</b></label>
              	<input type="number" name="price" class="form-control" placeholder="Price">
              </div>
              
              <div class="form-group">
              	<label><b>Contact No:</b></label>
              	<input type="number" name="contactNo"  class="form-control" placeholder="+977-XXXXXXXXXX">
              </div>
		    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
        </div>
    </div>
</div>
</body>
</html>
