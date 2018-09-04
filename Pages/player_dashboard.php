<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Futsal Management System</title>

  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles template -->
    <link href="../css/blog-home.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script> 
      $(function(){
        $("#header").load("header.php"); 
        $("#search").load("../pages/search.php");
      });
    </script> 
    
  </head>

<body class="body">
   
<!-- Calling header -->
<div id="header"></div>

<!-- Page Content -->
<div class="container">

  <div class="row">
  <!-- Main body -->
    <div class="col-md-8">
      <!--   Showing team create alert preventing player from creating multiple team -->
      <?php if(isset($_GET['err'])){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>You are already in a team.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?>
      <!--   Showing alert if player tries to create team with already present team name -->
      <?php if(isset($_GET['sameteamname'])){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>There is already a team with this name.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?>
      <!--   Showing view myteam and leave team error creating alert if player is not in any team -->
      <?php if(isset($_GET['err_myteam'])){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>You are not in any team.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?> 
      <!--   Showing delete team alert preventing unauthorized player to delete a team -->
      <?php if(isset($_GET['err_delteam'])){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>You are not a team captain, you cannot delete a team
      </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?>
      <!-- Delete success -->
      <?php if(isset($_GET['delteam'])){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Team successfully deleted.
      </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?>
      <!-- alert showing captain cannot leave the team -->
      <?php if(isset($_GET['err_leaveteam'])){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>You are the captain of the team, you cannot leave the team.<br>If you want to leave the team you have to delete it.
      </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?>
      <!-- leave success -->
      <?php if(isset($_GET['leaveteam'])){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully left team.
      </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?> 
      <!-- match create success -->
      <?php if(isset($_GET['matchreq'])){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully created a match.
      </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?> 
      <!-- match create failed -->
      <?php if(isset($_GET['err_matchreq'])){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failed to create Match.
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php } ?>
      <!-- Error during create team same id as current user -->
      <?php if(isset($_GET['err_sameid'])){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Create team failed, do no select yourself as a member.
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php } ?>
      <!-- Error during create team same members-->
      <?php if(isset($_GET['err_same'])){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Create team failed, Select different members.
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php } ?>
      <!-- create team success -->
      <?php if(isset($_GET['create_team'])){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully created a team.
      </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }?> 
      <!-- Error during create team -->
      <?php if(isset($_GET['err_create_team'])){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Create team failed.
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php } ?>
      <!-- Error No booking made-->
      <?php if(isset($_GET['nobooking'])){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>You dont have any booking.
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php } ?>
      <div>
      <div id="search"></div>
        <!-- <h1 class="my-4">Latest
          <small>News</small>
        </h1> -->

        <!-- Blog Post -->
<!--         <div class="card mb-4">
          <img class="card-img-top" src="../Image/Futsal/field.jpg" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">Field Arena</h2>
            <p class="card-text">Located at sanepa</p>
            <a target="_blank" href="https://www.google.com.np/maps/place/%E0%A4%95%E0%A5%8D%E0%A4%B7%E0%A5%87%E0%A4%A4%E0%A5%8D%E0%A4%B0+%E0%A4%AB%E0%A5%81%E0%A4%9F%E0%A4%B8%E0%A4%B2/@27.6859935,85.3022799,15z/data=!4m5!3m4!1s0x0:0xd9fc72f388ee688b!8m2!3d27.6859935!4d85.3022799" class="btn btn-primary">Location at google map</a>
          </div>
        </div> -->

      <!-- Blog Post -->
      <!-- <div class="card mb-4">
        <img class="card-img-top" src="../Image/Futsal/dhuku.jpg" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">Dhuku Futsal</h2>
          <p class="card-text">Located at Maharajgunj</p>
          <a target="_blank" href="https://www.google.com.np/maps/place/Dhuku+Futsal+Hub+Pvt+Ltd./@27.7318592,85.3350699,15z/data=!4m5!3m4!1s0x0:0x8bcb772d8306a3d0!8m2!3d27.7318592!4d85.3350699" class="btn btn-primary">Location at google map</a>
        </div>
      </div> -->

      <!-- Blog Post -->
      <!-- <div class="card mb-4">
        <img class="card-img-top" src="../Image/Futsal/harisiddhi.jpg" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">Harisiddhi Futsal</h2>
          <p class="card-text">Located at harisiddhi lalitpur.</p>
          <a target="_blank" href="https://www.google.com.np/maps/place/Harisiddhi+Futsal/@27.6392739,85.3386513,15z/data=!4m5!3m4!1s0x0:0x8b4e7726a408afe6!8m2!3d27.6392739!4d85.3386513" class="btn btn-primary">Location at google map</a>
        </div>
      </div> -->

      <!-- Pagination -->
     <!--  <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul> -->
    </div>
  </div>
</div>    
    
          

 
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>

<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
