<?php
session_start();
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

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles  -->
    <link href="../css/blog-home.css" rel="stylesheet">

</head>

<body class="body">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navcolor">
  <div class="container">
    <a class="navbar-brand" href="../pages/player_dashboard.php">Futsal Match Maker</a>
    <h6 style="color: green !important;"><?php echo $loggeduser_name; ?></h6>
    <!-- Nav bar toggler button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#createFutsal">Create Futsal</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View</a>
             <!--Dropdown link of view -->
            <div class="dropdown-menu color4" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="myfutsal.php">My Futsal</a>
              <a class="dropdown-item" href="futsal.html">Other Futsal<a>
            </div>
          </div>   
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Update</a>
             <!--Dropdown link of view -->
            <div class="dropdown-menu color4" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="../pages/futsal_update.php">My Futsal</a>
              <a class="dropdown-item" href="#">Booking Table<a>
            </div>
          </div>
        </li>
        <li>
          <a class="nav-link" href="../actions/logout.php">Log out</a>
        </li>  
      </ul>
    </div>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="createFutsal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header body">
        <h5 class="modal-title" id="exampleModalLabel">Create Futsal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form type="form-inline" role="form" action="../actions/create_futsal.php" method="Post">
          <div class="form-group">
            <label class="control-label" for="name">Futsal name</label>
            <div class="form-group">
              <input type="text" class="form-control" name="futsalname" placeholder="Futsal name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="venue">Location</label>
            <div class="form-group">
              <input class="form-control" type="text" name="venue" id="venue" placeholder="Location" required>
            </div>
          </div>  
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label class="control-label" for="time">Opening Time</label>
                <input class="form-group" type="time" name="opn_time" id="time" placeholder="HR:MM" >
              </div>
              <div class="col">
                <label class="control-label" for="time">Closing Time</label>
                <input class="form-group" type="time" name="cls_time" id="time" placeholder="HR:MM" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="price">Price</label>
            <div class="form-group">
              <input class="form-control" type="text" name="price" id="price" placeholder="per hr">
              <span id= "err5" style="color:red;"></span>
            </div>
          </div>  
          <div class="form-group">
            <label class="control-label" for="contact">Contact</label>
            <div class="form-group">
              <input class="form-control" type="number" name="contact" id="contact" placeholder="+977-XXXXXXXXXX">
              <span id= "err6" style="color:red;"></span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" class="btn btn-default">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>

<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
