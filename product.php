<?php
include 'header.php';
include 'classes/Product.php';
include 'classes/Database.php';
$product = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>



<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="index.php" class=""><img src="logo1.png" width="70px;"></a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">

            <a href="index.php#about" class="w3-bar-item w3-button"><i class="fas fa-align-justify"></i> KATEGORIJE</a>
            <a href="index.php#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> OPG KORISNICI</a>
            <a href="index.php#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> SVI PROIZVODI</a>
            <a href="index.php#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> KONTAKT</a>
            <a href="index.php" class="w3-bar-item w3-button"><i class="fas fa-angle-double-left"></i>NATRAG</a>

        </div>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>
<a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
<div class="w3-container w3-light-grey" style="padding:128px 16px; height: 600px;">
    <div class="w3-row-padding">
        <?php
        $productdata = $product->getProductByIdSearch($id);
        if ($productdata) {
        $i = 0;
        foreach ($productdata as $data) {
        $i++;
        ?>
        <div class="w3-col m6">
            <h3>Naziv: <?php echo $data['name']; ?></h3>
            <p>Opis: <?php echo $data['description']; ?></p>
            <p>Cijena: <?php echo $data['price']; ?> KM</p>
        </div>
        <?php } } ?>
        <div class="w3-col m6" style="width: 300px; height: 400px;">
            <img class="w3-image w3-round-large" src="uploads/<?php echo $data['img']; ?>">
        </div>
    </div>
</div>

<footer class="w3-center w3-black w3-padding-64">
    <a href="index.php" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
    <div class="w3-xlarge w3-section">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
