<?php

include "../classes/Product.php";
include "../classes/Category.php";
include "../classes/Session.php";

Session::init();
if (Session::get('role') == 1) {
Session::checkSession();


include "header.php";
include "sidebar.php";

?>

<?php

$product = new Product();
$category = new Category();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $addproduct = $product->insertProductAdmin($_POST);
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $productupdate = $product->updateProductData($id, $_POST);
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $productdelete = $product->deleteProduct($id);
}


?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <?php
            if (isset($addproduct)){
                echo $addproduct;
            } ?>

            <?php
            if (isset($productupdate)){
                echo $productupdate;
            } ?>

            <?php
            if (isset($productdelete)){
                echo $productdelete;
            } ?>


            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Proizvodi</li>
                <li>
                    <a href="" class="breadcrumb-item" style="margin-left: 700px;" data-toggle="modal" data-target="#modalRegisterForm">Dodajte novi proizvod</a>
                </li>
            </ol>

            <!-- Modal dialog -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Dodaj proizvod</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">

                                    <input type="text" id="orangeForm-name" name="name" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Naziv proizvoda</label>


                                    <input type="text" id="orangeForm-name" name="description" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Opis proizvoda</label>


                                    <input type="float" id="orangeForm-name" name="price" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Cijena</label>
                               <br>

                                <select class="browser-default custom-select" name="select">

                                <?php
                                    $categorydata = $category->getCategory();
                                    if ($categorydata) {
                                        $i = 0;
                                    foreach ($categorydata as $data) {
                                    $i++;
                                ?>
                                    <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>
                                    <?php } } ?>
                                </select>
                                <label data-error="wrong" data-success="right" for="orangeForm-name">Odaberite kategoriju</label>

                                <input type="file" id="orangeForm-name" name="file" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="orangeForm-name"></label>
                            </div>


                            <div class="md-form mb-4">
                                <input type="hidden" id="defaultForm-pass" name="userid" class="form-control validate" value="<?php echo Session::get('id'); ?>">
                                <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
                            </div>

                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-deep-orange" name="add">Dodajte proizvod</button>
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
                $productid = (int)$_GET['view'];
                $productview = $product->getProductById($productid);
            }
            if (isset($productview)) {
                ?>

                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slika</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-dark">
                        <th scope="row">1</th>
                        <td><?php echo $productview->name; ?></td>
                        <td>Slika</td>
                    </tr>

                    </tbody>
                </table>


            <?php } ?>

            <?php
            if (isset($_GET['edit'])) {
                $productid = (int)$_GET['edit'];
                $productedit = $product->getProductById($productid);
            }
            if (isset($productedit)) {
                ?>
                <form action="" method="post" enctype="multipart/form-data" style="margin-left: 20px;">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" style="width: 50%;" value="<?php echo $productedit->name; ?>" placeholder="Enter category name">
                    </div>
                    <div class="form-group">
                        <label for="file">Add image</label>
                        <input type="file" name="file" class="form-control" style="width: 50%;" value="<?php echo $productedit->img; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>
            <?php } ?>

            <h2>Proizvodi</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Slika</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <?php
                $productdata = $product->getProduct();
                if ($productdata) {
                    $i = 0;
                    foreach ($productdata as $data) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data["name"]; ?></td>
                            <td><img src="../uploads/<?php echo $data['img']; ?>" width="150px;"></td>
                            <td>
                                <a href="product.php?view=<?php echo $data['id']; ?>"
                                   class="btn btn-primary">View</a>
                                <a href="product.php?edit=<?php echo $data['id']; ?>"
                                   class="btn btn-info">Edit</a>
                                <a href="product.php?delete=<?php echo $data['id']; ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } } else { ?>
                    <tr><td><h2>No Product Data Found</h2></td></tr>
                <?php } ?>
            </table>

        </div>
    </div>

<?php include "footer.php";
} else {
    header("Location:login.php");
} ?>