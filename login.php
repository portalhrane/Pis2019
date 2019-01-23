<?php
include  "../classes/User.php";

$user = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $usrLogin = $user->userLogin($_POST);


}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="panel-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" />
            </div>
            <button type="submit" name="login" class="btn btn-success">Login</button>
        </form>
    </div>
