
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <script type="text/javascript">
      
    </script>
</head>

<body class="body">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navcolor">
    <div class="container">
      <a class="navbar-brand" href="#">Futsal Match Maker</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      </div>
    </div>
  </nav>
<div class="Container" style="max-width:600px;margin:60px auto;" >
<h3>Login</h3><br><br>
<form  action="actions/login.php" method="Post" >
  <div class="form-group">
    <label class="control-label" for="name">Username</label>
      <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <span id="err1" style="color:red;"></span>        
      </div>
  </div>
  <div class="form-group">
    <label class="control-label" for="pwd" >Password</label>
    <div class="form-group">
      <input class="form-control" type="password" name="password" id="pwd" placeholder="Password" required>
      <span id="err2" style="color:red;"></span>
    </div>
  </div>  
  <div>
    <button type="submit" name="login" class="btn btn-info" id="showBtn">Log In</button>
    <a href="./pages/signup.php">Sign up</a>
  </div>  
</form>
</div>
<script type="text/javascript">
var u=1;
var p=1;

function validate_user(val){
  var pat_email= /^[a-zA-Z]+[a-zA-Z0-9._-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,4}$/;
  var pat_num=/^[0-9]{10}$/;
  if(pat_num.test(val) || pat_email.test(val)){
    document.getElementById('err1').innerHTML=" ";
      u = 1;
  }else{
    document.getElementById('err1').innerHTML="This is invalid Username";
      u = 0;
  }
  if (u==1 && p==1) {
    $('#showBtn').fadeIn('slow');
  }else{
    $('#showBtn').hide();
  }
}

function validate_password(val){      
  if (val.length<8){
  document.getElementById('err2').innerHTML="Password must be 8 character long";
  p = 0;
  }else{
    document.getElementById('err2').innerHTML=" ";
    p = 1;
  }
  if (u==1 && p==1) {
    $('#showBtn').fadeIn('slow');
  }else{
    $('#showBtn').hide();
  }
}   
</script>
<script type="text/javascript"></script>
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
