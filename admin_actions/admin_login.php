<?php
//start the session
if (isset($_POST['login'])){
    // require database
    require_once '../connections/db.php';

    // Login Handler
    // get post data
    $username = $_POST['name'];
    $password = $_POST['password'];
    //$password=md5($password);
    $query = mysqli_query($con, "SELECT * FROM admin WHERE name='$username' AND password='$password' ");
    if (mysqli_num_rows($query) > 0) {
        session_start();
        $row = mysqli_fetch_assoc($query);
        
            $_SESSION['loggedUser'] = $row['id'];
            $_SESSION['loggedUser_name']=$row['name'];
            header('Location: ../admin/admin_dashboard.php');
    }else{
        header('Location:../admin/index.php?login_Err=1');   
    }
}

?>
