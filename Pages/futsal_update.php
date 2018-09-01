<?php
session_start();
require_once '../connections/db.php';
include '../actions/fupdate.php';
$loggeduser_name=$_SESSION['loggedUser_name'];
$loggeduser_id=$_SESSION['loggedUser'];
$query=mysqli_query($con,"SELECT * FROM futsal where uid= $loggeduser_id");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Player</title>
</head>
 <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="../css/blog-home.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- JQuery confirm dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<body class="body">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navcolor">
  <div class="container">
    <a class="navbar-brand" href="#">Futsal Match Maker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a href="futsal_dashboard.php"><button type="button" class="btn btn-info">Cancel</button></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="Container" style="max-width:600px;margin:60px auto;" >
  <h3>Update your profile</h3><br><br>
  <?php include "../actions/fupdate_error.php" ; ?>  
  <form role="form" action="futsal_update.php" method="Post">
    <div class="form-group">
      <label class="control-label" for="name">Futsal name</label>
      <div class="form-group">
        <input type="hidden" name="fid" value="<?php echo $row["fid"]; ?>">
        <input type="text" class="form-control" name="futsalname" value="<?php echo $row["fname"]; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label" for="venue">Location</label>
      <div class="form-group">
        <input class="form-control" type="text" name="venue" id="venue" value="<?php echo $row["location"]; ?>" required>
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
        <input class="form-control" type="text" name="price" id="price" value="<?php echo $row["price"]; ?>">
        <span id= "err5" style="color:red;"></span>
      </div>
    </div>  
    <div class="form-group">
      <label class="control-label" for="contact">Contact</label>
      <div class="form-group">
        <input class="form-control" type="number" name="contact" id="contact" value="<?php echo $row["contact"]; ?>">
        <span id= "err6" style="color:red;"></span>
      </div>
    </div>
    <button  class="btn btn-primary" name="update" class="btn btn-default">Update</button>
  </form>
</div>
</body>
</html>
