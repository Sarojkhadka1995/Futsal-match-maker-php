<?php
session_start();
require_once '../connections/db.php';
$query=mysqli_query($con,"SELECT * FROM users where tid=0 and type='player'");
$loggeduser_name=$_SESSION['loggedUser_name'];
$loggeduser_id=$_SESSION['loggedUser'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Futsal Management System</title>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
     
 
    <!-- Custom styles  -->
    <link href="../css/blog-home.css" rel="stylesheet">

    <!-- JQuery confirm dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
  </head>

  <body class="body">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navcolor">
      <div class="container-fluid">
        <a class="navbar-brand" href="../pages/player_dashboard.php">Futsal Match Maker</a>
        <h6 style="color: green !important;"><?php echo $loggeduser_name; ?></h6>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#createTeam">Create team</a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View</a>
                 <!--Dropdown link of view -->
                <div class="dropdown-menu color4" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="myteam.php">My Team</a>
                  <a class="dropdown-item" href="allteam.php">All Team</a>
                  <a class="dropdown-item" href="futsal.html">Futsal<a>
                </div>
              </div>   
            </li>
            <li class="nav-item">
              <a class="nav-link" href="player_update.php">Update</a>
            </li>
            <li>
              <a href="../pages/notification.php" class="nav-link notify">Notification<span class="badge count" style="color:red;border-radius:10px;"></span></a>
            </li>
            <li>
              <a class="nav-link" href="../actions/logout.php">Log out</a>
            </li>  
          </ul>
        </div>
      </div>
    </nav>

     <!-- Modal -->
<div class="modal fade" id="createTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header body">
        <h5 class="modal-title" id="exampleModalLabel">Create Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form type="form-inline" role="form" action="../actions/create_team.php" method="Post">
          <div class="form-group">
            <label class="control-label" for="name">Team name</label>
            <div class="form-group">
              <input type="text" class="form-control" name="teamname" placeholder="Team name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="venue">Preferred venue</label>
            <div class="form-group">
              <input class="form-control" type="text" name="venue" id="venue" placeholder="Preferred venue" required>
            </div>
          </div>  
          <div class="form-group">
            <label class="control-label" for="time">Time</label>
            <div class="form-group">
              <input class="form-group" type="time" name="time" id="time" placeholder="HR:MM" >
            </div>
          </div>  
          <div class="form-group">
            <label class="control-label" for="contact">Contact</label>
            <div class="form-group">
              <input class="form-control" type="number" name="contact" id="contact" placeholder="+977-XXXXXXXXXX">
              <span id= "err5" style="color:red;"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Members</label>
            <div class="form-row">
              <div class="col">
                <select class="form-control" name="member1">
                    <?php
                    while($row = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col">
                <select class="form-control" name="member2">
                    <?php
                    $query=mysqli_query($con,"SELECT * FROM users where tid=0 and type='player'");
                    while($row = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col">
                <select class="form-control" name="member3">
                    <?php
                    $query=mysqli_query($con,"SELECT * FROM users where tid=0 and type='player'");
                    while($row = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col">
                <select class="form-control" name="member4">
                    <?php
                    $query=mysqli_query($con,"SELECT * FROM users where tid=0 and type='player'");
                    while($row = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" class="btn btn-default">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript -->


<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
  function load_unseen_notification()
   {
    var view=1;
    //alert("Inside unseen_notification");
    $.ajax({
      url:"../actions/fetch_notification.php",
      method:"post",
      data:{
        view:view},
      dataType:"json",
      success:function(json){
        if(json.unseen_notification > 0){
          $('.count').html(json.unseen_notification);
          
        }
      },error: function(){
        $.alert({
               title: 'Invalid Number',
               content: 'Invalid Phone number!',
        })
      }
    });
  }

  load_unseen_notification();
  // $(document).on('click', '.notify', function(){
  //   alert("Clicked");
  //   $('.count').html('');
  //   load_unseen_notification('yes');
  // });

  setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
</body>
</html>