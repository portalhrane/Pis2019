<div class="w3-container" style="padding:128px 16px" id="work" xmlns:width="http://www.w3.org/1999/xhtml">
    <h3 class="w3-center">SVI PROIZVODI</h3>

    <div class="w3-row-padding" style="margin-top:64px">
        <?php
        $productdata = $product->getProduct();
        if ($productdata) {
        $i = 0;
        foreach ($productdata as $data) {
        $i++;
        ?>
        <div class="w3-col l3 m6">
            <img src="uploads/<?php echo $data['img']; ?>" style="width:200px; height: 200px;" onclick="onClick(this)" class="w3-hover-opacity" alt="<?php echo $data['name']; ?>">
            <h4>Naziv: <?php echo $data['name']; ?></h4>
            <p>Cijena: <?php echo $data['price']; ?> KM</p>
            <p>Opis: <?php echo $data['description']; ?></p>
        </div>
        <?php } } ?>
  

    </div>

    <div class="w3-row-padding w3-section">

</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption" class="w3-opacity w3-large"></p>
    </div>
</div>

<!-- Skills Section -->
<div class="w3-container w3-light-grey w3-padding-64">

</div>

<!-- Pricing Section -->
