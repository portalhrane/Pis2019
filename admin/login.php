<?php
include '../classes/User.php';

Session::init();
$user = new User();


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

        $usrLogin = $user->userLogin($_POST);

}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
         <!--   <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div> -->
          <!--  <a class="btn btn-primary btn-block" name="login" href="index.php">Login</a> -->
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <!--  <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
          </div>
        </div>
      </div>
    </div>

    <?php

  /*  $conn = mysqli_connect("localhost", "root", "", "testing");


    if(isset($_POST['login'])){
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $password = md5($password);

    /*  $role = "SELECT *
               FROM user_role as ur
               INNER JOIN users AS u ON u.user_id = ur.user_id
               INNER JOIN roles AS r ON r.role_id = ur.role_id ";
      $roleresult = mysqli_query($conn, $role); */
    /*  $query = "SELECT *
                FROM user_role as ur
                INNER JOIN users AS u ON u.user_id = ur.user_id
                INNER JOIN roles AS r ON r.role_id = ur.role_id
                WHERE u.username = '$username' AND u.password = '$password'"; */

     /* $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password' ";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $_SESSION["username"] = $_POST["username"];
        /*  $_SESSION["user_id"] = trim($row["user_id"]);
          $_SESSION["loggedin"] = true;
          $_SESSION["role"] = $row['role_name'];*/
      /*  }
        header('location:index.php');
      }else {
        echo "No";
      }
    } */
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
