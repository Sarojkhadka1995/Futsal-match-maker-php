<?php
    require_once"../../connections/db.php";

?>

<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Area| Account Login</title>    
     <!-- Bootstrap core CSS -->

     <link href="../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     
     <link href="../../resources/webfonts/css/fontawesome-all.min.css" rel="stylesheet">
     
    <link href="../../resources/css/style.css" rel="stylesheet">
     
    <script type="text/javascript" src="../../resources/js/jquery-3.1.1.min.js"></script>
   	
    <script type="text/javascript" src="../../resources/bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>
    
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <h1>Account Login</h1>
                </div>
            </div>
        </div>
    </header>
    
    <section id="main">
    <div class="container">
        <div class="row">
           <div class="col-lg-4 offset-lg-4">
          
             <form id="login" class="card bg-light card-body mb-3" action="../../actions/admin_login.php"  method="POST">
             	<div class="form-group">
             	 <label><b>Username</b></label>
             	 <input type="text" class="form-control" name="name" placeholder="Enter Username">
             	</div>
             	
             	<div class="form-group">
             	 <label><b>Password</b></label>
             	 <input type="password" class="form-control" name="password" placeholder="Enter Password">
             	</div>
             	
             	<button type="submit" name ="login" class="btn btn-secondary btn-block">Login</button>
             </form>
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
