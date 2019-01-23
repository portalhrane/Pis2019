<?php
include '../classes/User.php';
Session::init();

if (Session::get('role') == 1) {
    Session::checkSession();
    $user = new User();


    include_once('header.php');
?>

      <!-- Sidebar -->
<?php
    include_once('sidebar.php');
?>
      <!-- Dashboard -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>


            <!-- DataTables Example -->
            <div class="card mb-3">

                <div class="card-body">
                    <div class="table-responsive">
                    <h3>
                        <?php
                        $loginmsg = Session::get("loginmsg");
                        if (isset($loginmsg)) {
                            print_r($loginmsg);
                        }
                        ?>
                    </h3>
                        <h4>Dobro dosli: <?php
                            $name = Session::get("name");
                            if (isset($name)) {
                                echo $name;
                            }
                            ?></h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php

include 'footer.php';

} else {
    header("Location:login.php");
} ?>


