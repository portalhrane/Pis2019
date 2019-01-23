<?php

include "../classes/Category.php";
include "../classes/Session.php";

Session::init();
if (Session::get('role') == 1) {
Session::checkSession();

include "header.php";

include "sidebar.php";
?>

<?php

$category = new Category();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcategory'])) {
    $addcategory = $category->insertCategory($_POST);
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $categoryupdate = $category->updateCategoryData($id, $_POST);
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $categorydelete = $category->deleteCategory($id);
}

?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <?php
            if (isset($addcategory)){
                echo $addcategory;
            } ?>

            <?php
            if (isset($categoryupdate)){
                echo $categoryupdate;
            } ?>

            <?php
            if (isset($categorydelete)){
                echo $categorydelete;
            } ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Kategorija</li>
                <li>
                    <a href="" class="breadcrumb-item" style="margin-left: 700px;" data-toggle="modal" data-target="#modalRegisterForm">Dodajte novu kategoriju</a>
                </li>
            </ol>

            <!-- Modal dialog -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Dodavanje kategorije</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <div class="md-form mb-5">
                                    <input type="text" id="orangeForm-name" name="name" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Ime kategorije</label>
                                </div>

                                <div class="md-form mb-5">
                                    <input type="file" id="orangeForm-file" name="file" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-file">Dodajte sliku</label>
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-deep-orange" name="addcategory">Dodaj kategoriju</button>
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
                $categoryid = (int)$_GET['view'];
                $categorydataview = $category->getCategoryById($categoryid);
            }
            if (isset($categorydataview)) {
                ?>

                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Slika</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-dark">
                        <th scope="row">1</th>
                        <td><?php echo $categorydataview->name; ?></td>
                        <td><img src="../uploads/<?php echo $categorydataview->img; ?>" style="width: 150px;"></td>
                    </tr>

                    </tbody>
                </table>


            <?php } ?>

            <?php
            if (isset($_GET['edit'])) {
                $categoryid = (int)$_GET['edit'];
                $categorydataedit = $category->getCategoryById($categoryid);
            }
            if (isset($categorydataedit)) {
                ?>
                <form action="" method="post" style="margin-left: 20px;" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Naziv</label>
                        <input type="text" name="name" class="form-control" style="width: 50%;" value="<?php echo $categorydataedit->name; ?>" placeholder="Enter category name">
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" class="form-control" style="width: 50%;" value="<?php echo $categorydataedit->img; ?>" placeholder="Enter category name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>
            <?php } ?>

            <h2>Vrsta hrane</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Naziv</th>
                    <th>Slika</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <?php
                        $categorydata = $category->getCategory();
                        if ($categorydata) {
                            $i = 0;
                            foreach ($categorydata as $data) {
                                $i++;
                                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data["name"]; ?></td>
                            <td><img src="../uploads/<?php echo $data['img']; ?>" style="width: 150px;"></td>
                            <td>
                                <a href="category.php?view=<?php echo $data['id']; ?>"
                                   class="btn btn-primary">View</a>
                                <a href="category.php?edit=<?php echo $data['id']; ?>"
                                   class="btn btn-info">Edit</a>
                                <a href="category.php?delete=<?php echo $data['id']; ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } } else { ?>
                    <tr><td><h2>No Category Data Found</h2></td></tr>
                <?php } ?>
            </table>

        </div>
    </div>

<?php include "footer.php";
} else {
    header("Location:login.php");
}
?>