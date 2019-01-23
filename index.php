<?php

include_once 'classes/User.php';
include_once 'classes/Category.php';
include_once 'classes/Product.php';


Session::init();

?>

<?php

$user = new User();

    $loginmsg = Session::get("loginmsg");
    if (isset($loginmsg)) {
        //echo $loginmsg;
    }
?>


<?php
include 'header.php';
?>
<?php

    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        Session::destroy();
    }
?>

<!-- Navbar (sit on top) -->
<?php

include 'nav.php';
?>

<?php


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $usrLogin = $user->userLogin($_POST);
   // echo $usrLogin;
}

$product = new Product();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addproduct'])) {

    $addproduct = $product->insertProduct($_POST);

    ?>

<?php

}
?>


<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fas fa-align-justify"></i> KATEGORIJE</a>
    <a href="#team.php" onclick="w3_close()" class="w3-bar-item w3-button">OPG KORISNICI</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<div id="result"></div>
<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-white" style="padding:48px">
        <?php
        if (isset($addproduct)){
            echo $addproduct;
        ?>

        <?php } ?>
        <span class="w3-jumbo w3-hide-small">Pogledajte sve eko proizvode</span><br>
        <span class="w3-xxlarge w3-hide-large w3-hide-medium"></span><br>
        <span class="w3-large">Uvijek svježi i ukusni proizvodi.</span>
        <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Pogledajte proizvode</a></p>
    </div>
    <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
</header>


<!-- About Section -->
<?php
include 'about.php';
?>

<!-- Team Section -->
<?php
include 'team.php';
?>

<!-- Work Section -->
<?php
include 'work.php';
?>


<!-- Contact Section -->//
<?php
include 'contact.php';

?>//

<!-- Footer -->
<?php
include 'footer.php';
?>


<form action="" method="post">
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Prijava</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="text" id="defaultForm-username" name="username" class="form-control validate" placeholder="Vaše korisnicko ime">
                        <label data-error="wrong" data-success="right" for="defaultForm-username"></label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" id="defaultForm-pass" name="password" class="form-control validate" placeholder="Vaša lozina">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" name="login" id="login_button">Prijava</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Dodajte novi proizvod</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">

                        <input type="text" id="defaultForm-username" name="name" class="form-control validate" placeholder="Naziv proizvoda">
                        <label data-error="wrong" data-success="right" for="defaultForm-username"></label>
                    </div>

                    <div class="md-form mb-4">
                        <input type="text" id="defaultForm-pass" name="description" class="form-control validate" placeholder="Unesite opis proizvoda">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>

                    </div>

                    <div class="md-form mb-4">
                        <input type="float" id="defaultForm-pass" name="price" class="form-control validate" placeholder="Unesite cijenu">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
                    </div>

                    <div class="md-form mb-4">
                        <input type="file" id="defaultForm-pass" name="file" class="form-control validate" placeholder="Dodajte sliku">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
                    </div>

                    <div class="md-form mb-4">
                        <input type="hidden" id="defaultForm-pass" name="userid" class="form-control validate" value="<?php echo Session::get('id')?>">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
                    </div>

                    <div class="md-form mb-4">
                        <select class="browser-default custom-select" name="select"  style="width: 570px; height: 30px;">
                            <option selected>Odaberite kategoriju</option>
                            <?php
                            $category = new Category();
                            $categorydata = $category->getCategory();
                            if ($categorydata) {
                                $i = 0;
                                foreach ($categorydata as $data) {
                                    $i++;
                                    ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" name="addproduct" id="addproduct">Dodaj proizvod</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>

<script>
    $(document).ready(function() {
        $('#form-control-search').keyup(function() {
            var txt = $(this).val();
            if (txt != '') {
                $.ajax({
                    url: "action.php",
                    mathod: "GET",
                    data: {search: txt},
                    dataType: "text",
                    success: function (data) {
                        $('#result').html(data);
                    }
                })
            }
            else {
                $('#result').html('');
            }
        });
    });
</script>

<script>
    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }


    // Toggle between showing and hiding the sidebar when clicking the menu icon
    var mySidebar = document.getElementById("mySidebar");

    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
        } else {
            mySidebar.style.display = 'block';
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
    }
</script>

</body>
</html>
