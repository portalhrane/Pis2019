<div class="w3-container" style="padding:50px 16px" id="about">
    <h3 class="w3-center">KATEGORIJA PROIZVODA</h3>
    <div class="w3-row-padding w3-center" style="margin-top:64px">
        <?php
        $category = new Category();
        $categorydata = $category->getCategory();
        if ($categorydata) {
        $i = 0;
        foreach ($categorydata as $data) {
        $i++;
        ?>
        <div class="w3-quarter">
            <img src="uploads/<?php echo $data['img']; ?>" style="width: 170px; height: 150px;">
            <p class="w3-large"><a href="category.php?view=<?php echo $data['id'];?>"><?php echo $data['name']; ?></a></p>
        </div>

        <?php } } ?>

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