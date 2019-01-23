<?php

include "../classes/User.php";
Session::init();
if (Session::get('role') == 1) {
    Session::checkSession();

include "header.php";
include "sidebar.php";
?>

    <?php

    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $userRegistation = $user->userRegistration($_POST);
    }

    if (isset($_GET['edit'])) {
        $id = (int)$_GET['edit'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $userupdate = $user->updateUserData($id, $_POST);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $userdelete = $user->deleteUser($id);
    }

    ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <?php
            if (isset($userRegistation)) {
                echo $userRegistation;
            } ?>

            <?php
            if (isset($userupdate)) {
                echo $userupdate;
            } ?>

            <?php
            if (isset($userdelete)) {
                echo $userdelete;
            } ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Korisnici</li>
                <li>
                    <a href="" class="breadcrumb-item" style="margin-left: 800px;" data-toggle="modal"
                       data-target="#modalRegisterForm">Dodajte novog OPG korisnika</a>
                </li>
            </ol>

            <!-- Modal dialog -->
            <form action="" method="post">
                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Dodavanje OPG korisnika</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">

                                    <input type="text" id="orangeForm-name" name="name" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Ime i prezime
                                        </label>


                                    <input type="text" id="orangeForm-email" name="username"
                                           class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-email">Korisnicko
                                        ime</label>



                                    <input type="password" id="orangeForm-pass" name="password"
                                           class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Lozinka</label>


                                    <input type="text" id="orangeForm-name" name="company"
                                           class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Poduzece
                                        </label>


                                    <input type="text" id="orangeForm-email" name="address"
                                           class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-email">Adresa
                                        </label>

                                    <input type="text" id="orangeForm-email" name="phone_number"
                                           class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-email">Broj telefona
                                        </label>
                                    <input type="text" id="orangeForm-email" name="email"
                                           class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-email">Email
                                    </label>


                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-deep-orange" name="register">Dodajte</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- result ajax pretraga -->
            <div id="result">

            </div>
            <?php

            if (isset($_GET['view'])) {
                $userid = (int)$_GET['view'];
                $userdataview = $user->getUserById($userid);
            }
            if (isset($userdataview)) {
                ?>

                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime i prezime</th>
                        <th scope="col">Username</th>
                        <th scope="col">Poduzece</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-dark">
                        <th scope="row">1</th>
                        <td><?php echo $userdataview->name; ?></td>
                        <td><?php echo $userdataview->username; ?></td>
                        <td><?php echo $userdataview->company; ?></td>
                    </tr>

                    </tbody>
                </table>


            <?php } ?>

            <?php
            if (isset($_GET['edit'])) {
                $userid = (int)$_GET['edit'];
                $userdataedit = $user->getUserById($userid);
            }
            if (isset($userdataedit)) {
                ?>
                <form action="" method="post" style="margin-left: 20px;">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" style="width: 50%;"
                               value="<?php echo $userdataedit->name; ?>" placeholder="Enter category name">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" style="width: 50%;"
                               value="<?php echo $userdataedit->username; ?>" placeholder="Enter username">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" style="width: 50%;"
                               value="<?php echo $userdataedit->company; ?>" placeholder="Enter company">
                        <label>Adresa</label>
                        <input type="text" name="address" class="form-control" style="width: 50%;"
                               value="<?php echo $userdataedit->address; ?>" placeholder="Enter address">
                        <label>Broj telefona</label>
                        <input type="text" name="phone_number" class="form-control" style="width: 50%;"
                               value="<?php echo $userdataedit->phone_number; ?>" placeholder="Enter number">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" style="width: 50%;"
                               value="<?php echo $userdataedit->email; ?>" placeholder="Enter address">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>
            <?php } ?>

            <h2>Lista korisnika</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Br.</th>
                    <th>Ime i prezime</th>
                    <th>Korisnicko ime</th>
                    <th>Poduzece</th>
                    <th>Adresa</th>
                    <th>Br. telefona</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <?php
                $userdata = $user->getUserData();
                if ($userdata) {
                    $i = 0;
                    foreach ($userdata as $data) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data["name"]; ?></td>
                            <td><?php echo $data["username"]; ?></td>
                            <td><?php echo $data["company"]; ?></td>
                            <td><?php echo $data["address"]; ?></td>
                            <td><?php echo $data["phone_number"]; ?></td>
                            <td><?php echo $data["email"]; ?></td>
                            <td>
                                <a href="users.php?view=<?php echo $data['id']; ?>"
                                   class="btn btn-primary">View</a>
                                <a href="users.php?edit=<?php echo $data['id']; ?>"
                                   class="btn btn-info">Edit</a>
                                <a href="users.php?delete=<?php echo $data['id']; ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td><h2>No User Data Found</h2></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>

    <?php include "footer.php";
} else {
    header("Location:login.php");
}
?>
