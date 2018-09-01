<?php
// destroy session
session_destroy();
session_unset();

header('Location: ../index.php');
 ?>
