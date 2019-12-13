<?php
  session_start();
  $db_conn = mysqli_connect("localhost", "root", "", "venue_rob");

  if(mysqli_connect_errno()) {

    print_r(mysqli_connect_error());
    exit();

  }

  if (isset($_GET['function']) == 'logout') {

    session_unset();
    header("location: index.php");
  
  }

?>

