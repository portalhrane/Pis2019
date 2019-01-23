<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="index.php" class=""><img src="logo1.png" width="70px;"></a>
        <?php
        $name = Session::get("name");
        if (isset($name)) {
            echo $name;
        }
        ?>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
            <div class="w3-bar-item" style="width: 200px; height: 52px;">
                <form class="form-inline md-form form-sm active-cyan-2 mt-2">
                    <input class="form-control form-control-sm mr-3 w-75" id="form-control-search" name="search" data-toggle="modal" data-target="#exampleModal" type="text" placeholder="Search" aria-label="Search" style="margin-top: -20px;">
                </form>
            </div>

            <a href="index.php#about" class="w3-bar-item w3-button"><i class="fas fa-align-justify"></i> KATEGORIJE</a>
            <a href="index.php#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> OPG KORISNICI</a>
            <a href="index.php#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> SVI PROIZVODI</a>
            <a href="index.php#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> KONTAKT</a>
            <?php   $id = Session::get("id");
                    $userlogin = Session::get("login");
                    if ($userlogin == false) { ?>
            <a href="" class="w3-bar-item w3-button" data-toggle="modal" data-target="#modalLoginForm"><i class="fa fa-sign-in-alt"></i>
                PRIJAVA</a>
            <?php } ?>

            <?php $id = Session::get("id");
                  $userlogin = Session::get("login");
                  if ($userlogin == true) { ?>
            <a href="" class="w3-bar-item w3-button" data-toggle="modal" data-target="#modalAddProduct"><i class="fas fa-plus"></i>
              DODAJ PROIZVOD</a>
            <!--<a href="?action=logout" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i>LOGOUT</a> -->
            <a href="logout.php" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i>ODJAVA</a>
        <?php } ?>

        </div>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>