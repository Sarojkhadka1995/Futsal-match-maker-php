<?php
//start the session
session_start();
if (isset($_POST['login'])){
    // require database
    require_once '../connections/db.php';

    // Login Handler
    // get post data
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password=md5($password);
    $query = mysqli_query($con, "SELECT * FROM users WHERE (email='$username' or contact='$username') AND password='$password' ");
    if (mysqli_num_rows($query) > 0) {
        // login users
        $row = mysqli_fetch_assoc($query);

      if ($row['type'] == 'player') {
            $_SESSION['loggedUser_name']=$row['name'];
            $_SESSION['loggedUser'] = $row['uid'];
            header('Location: ../pages/player_dashboard.php');
        }
        elseif ($row['type'] == 'futsal') {
            $_SESSION['loggedUser'] = $row['uid'];
            $_SESSION['loggedUser_name']=$row['name'];
            header('Location: ../pages/futsal_dashboard.php');
        }
        else {
            $_SESSION['loggedUser'] = $row['uid'];
            $_SESSION['loggedUser_name']=$row['name'];
            header('Location: ../pages/admin_dashboard.php');
        }
    }else{
        header('Refresh:5,URL=../index.php');
        echo "User doesnot exist"."<br>";
        echo "Redirecting back ot login page in 5 sec...";    
    }
}

?>
