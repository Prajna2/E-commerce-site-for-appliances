<?php
    if (!empty($_POST['email']) && !empty($_POST['psw'])) {
      $email = $_POST['email'];
      $pass = $_POST['psw'];

      $con = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
      mysqli_select_db($con, 'miniproject') or die("cannot select DB");

      $query = mysqli_query($con, "SELECT * FROM register WHERE email='" . $email . "' AND pass='" . $pass . "'");
      $numrows = mysqli_num_rows($query);
      if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $dbusername = $row['email'];
          $dbpassword = $row['pass'];
        }

        if ($email == $dbusername && $pass == $dbpassword) {
          session_start();
          $_SESSION['sess_user'] = $email;

          /* Redirect browser */
          header("Location: proj.html");
        }
      } else {
        echo "Invalid email or password!";
      }
    } else {
      echo "All fields are required!";
    }
  ?>