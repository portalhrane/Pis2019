<div class="w3-container" style="padding:128px 16px" id="team">
    <h3 class="w3-center">OPG KORISNICI</h3>


    <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
        <?php
        $userdata = $user->getUserData();
        if ($userdata) {
            $i = 0;
            foreach ($userdata as $data) {
                $i++;
                ?>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">
                <img src="user-img.png" alt="John" style="width:40%">
                <div class="w3-container">
                    <h3>Ime: <?php echo $data['name']; ?></h3>
                    <p>Poduzece: <?php echo $data['company']; ?></p>
                    <p>Kontakt broj: <?php echo $data['phone_number']; ?></p>
                    <p>Email: <?php echo $data['email']; ?></p>
                    <p>Adresa: <?php echo $data['address']; ?></p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                </div>
            </div>
        </div>
        <?php } } ?>

    </div>
</div>

<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
    <div class="w3-quarter">
        <span class="w3-xxlarge">14+</span>
        <br>Partneri
    </div>
    <div class="w3-quarter">
        <span class="w3-xxlarge">30+</span>
        <br>OPG korisnici
    </div>
    <div class="w3-quarter">
        <span class="w3-xxlarge">89+</span>
        <br>Zadovoljni kupci
    </div>
    <div class="w3-quarter">
        <span class="w3-xxlarge">150+</span>
        <br>Posjetitelja
    </div>
</div>