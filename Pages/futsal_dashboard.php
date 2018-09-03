<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Futsal Owner Dashboard</title>

  <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles template -->
    <link href="../css/blog-home.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script> 
      $(function(){
        $("#fheader").load("../pages/fheader.php"); 
        $("#sidebar").load("sidebar.html"); 
      });
    </script> 
 
</head>
<body class="body"><!-- Calling header -->
  <div id="fheader"></div>
<!-- Alert showing you aleardy have a team -->
  <?php if(isset($_GET['err'])){ ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>You have already created a futsal.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
<!-- Alert showing you dont have futsal -->
  <?php if(isset($_GET['err_myfutsal'])){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>You dont have a futsal.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
<!-- Alert show delete error -->
  <?php if(isset($_GET['del_err'])){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Delete futsal failed.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
<!--Alert showing delete success -->
  <?php if(isset($_GET['del_success'])){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Futsal deleted successfully.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
  <!--Alert showing futsal create success -->
  <?php if(isset($_GET['create_success'])){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Futsal created successfully.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
  <!--Alert showing futsal create error-->
  <?php if(isset($_GET['create_err'])){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Futsal with this name and location already present.<br>Please enter your actual futsal detail.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
  <!--Alert showing futsal update success -->
  <?php if(isset($_GET['update_success'])){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Futsal updated successfully.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
  <!--Alert showing futsal update error -->
  <?php if(isset($_GET['update_err'])){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Futsal update failed.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php } ?>
</body>
</html>
