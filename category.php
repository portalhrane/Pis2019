<?php
include_once 'classes/User.php';
Session::init();

include_once 'classes/Product.php';
include 'header.php';
include 'nav.php';

?>
    <!-- Sidebar on small screens when clicking the menu icon -->


<div id="result"></div>
<!-- Header with full-height image -->
<div class="w3-container" style="padding:50px 16px" id="about">
    <h3 class="w3-center">KATEGORIJA PROIZVODA</h3>
    <div class="w3-row-padding w3-center" style="margin-top:64px">

        <?php
            $product = new Product();
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['view'])) {
            $id = $_GET['view'];
            $productsdata = $product->getProductsAndCategoriesAndUsers($id);
            if ($productsdata) {
            foreach ($productsdata as $data){ ?>
                <div class="w3-quarter">
                <img src="uploads/<?php echo $data['img']; ?>" style="width: 150px; height: 200px;">
                <p class="w3-large"><a href="category.php?view=<?php echo $data['id'];?>"><?php echo $data['name']; ?></a></p>
                    <p>Opis: <?php echo $data['description']; ?></p>
                    <p>Cijena: <?php echo $data['price']; ?> KM</p>
                    <p>Kontakt broj: <?php echo $data['phone_number']; ?> </p>
                    <p>Email adresa: <?php echo $data['email']; ?> </p>
                    <p>Proizvođac: <?php echo $data['company']; ?></p>
                    <p>Adresa: <?php echo $data['address']; ?></p>
                </div>
        <?php } } ?>

        <?php } ?>
    </div>
</div>

    <!-- Promo Section - "We know design" -->
    <div class="w3-container w3-light-grey" style="padding:128px 16px">
        <div class="w3-row-padding">
            <div class="w3-col m6">
                <h3>Što je eko proizvod ?</h3>
                <p>Ekološka proizvodnja je, što bi se pučki reklo, proizvodnja bez kemije, bez herbicida, pesticida i korištenja mineralnih gnojiva koja su bazirana na lako topivim fosfatima<br>Nadalje, nema uporabe GMO-a, a da bi se proizvod ili prerađevina uopće mogli deklarirati kao ekološki, u sebi moraju sadržavati minimalno 95 posto ekoloških sastojaka.</p>
            </div>
            <div class="w3-col m6">
                <img class="w3-image w3-round-large" src="vegetables.jpg" alt="Buildings" width="700" height="394">
            </div>
        </div>
    </div>

<?php
include 'footer.php';
