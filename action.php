<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>


<?php

$db = new mysqli('localhost','root','','eco_products');
$sql = "SELECT * FROM products WHERE name LIKE '%".$_GET["search"]."%'";
$result = $db->query($sql);
$row_count = $result->num_rows;

if($row_count > 0) {

    echo "<table class='table tabel bordered' style='margin-left: 20%; margin-top: 50px; width: 700px; background-color: aliceblue'>
    <tr style='font-size: 80px;'>
   <th>Naziv</th>
   <th>Slika</th>
   <th>Opis</th>

   </tr>";

    while ($row = $result->fetch_assoc()) {
        echo ' <tr>
                    <td><h4><a style="color: black" href="product.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h4></td>
                    <td><img src="uploads/'.$row['img'].'" width="70px;"></td>
                    <td><h5>'. $row["description"].'</h5></td>

                   </tr> ';
    }
} else {
    echo "Nema pronadenih";
}
