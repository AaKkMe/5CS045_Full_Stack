<?php
$jsonString = file_get_contents('products.json');
$products = json_decode($jsonString, true);

foreach ($products as $p) {
    echo "Name: " . $p['name'] . " - Price: " . $p['price'] . "<br>";
}
?>