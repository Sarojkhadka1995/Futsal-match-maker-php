<!DOCTYPE html>
<html>
<head>
  <title>Create team form</title>
   <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>

<!-- Custom styles for this template -->
  <link href="../css/blog-home.css" rel="stylesheet">


<script src="//code.jquery.com/jquery-1.10.2.js"></script>

  <script> 
    $(function(){
      $("#header").load("../pages/header.php"); 
      //$("#sidebar").load("sidebar.html"); 
    });
  </script> 
</head>
<!-- custom css for body -->
<body class="body">
<!-- inserting header from javascrip function -->
<div id="header"></div>
<!--Remaining section-->
<div class="Container" style="max-width:600px;margin:60px auto;" >  
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
</body>
</html>