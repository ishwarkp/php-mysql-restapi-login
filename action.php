<?php

  include("functions.php");

  if ($_GET['action'] == "loginSignup") {

      $error = "";

      if (!$_POST['email']) {

        $error = "An email address is required.";

      } else if (!$_POST['password']){

        $error = "Password is required";

      } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

        $error = "Please enter a valid email address.";

      }

      if ($error != "") {

        echo $error;
        exit();

      }

      if ($_POST['loginActive'] == "0") {

        $query = "SELECT * FROM tbl_users WHERE email='".mysqli_real_escape_string($db_conn, $_POST['email'])."' LIMIT 1";
        $result = mysqli_query($db_conn, $query);

        if(mysqli_num_rows($result) > 0)  echo $error = "This email address is already exist.";
        else {

          $query = "INSERT INTO tbl_users (email, password) VALUES ('".mysqli_real_escape_string($db_conn, $_POST['email'])."', '".mysqli_real_escape_string($db_conn, md5($_POST['password']))."')";

          if(mysqli_query($db_conn, $query)) {

            $_SESSION['id'] = mysqli_insert_id($db_conn);

            $query = "UPDATE tbl_users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."', username = '".strstr($_POST['email'], '@', true)."' WHERE id = ".$_SESSION['id']." LIMIT 1";

            mysqli_query($db_conn, $query);

            echo 1;

          } else {

            echo $error = "Couldn't create user - please try again later.";
          }

        }

      } else {

            $query = "SELECT * FROM tbl_users WHERE email='".mysqli_real_escape_string($db_conn, $_POST['email'])."' LIMIT 1";

            $result = mysqli_query($db_conn, $query);

            $row = mysqli_fetch_assoc($result);

              if($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                echo 1; 

              } else {

                echo $error = "invalid email/password";
                
              }
      }

    }


?>
