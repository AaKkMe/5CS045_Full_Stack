<?php

include 'connection.php';


$sql = "SELECT * FROM books WHERE category = '$_POST[category]'";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    echo "Title: " . $row['title'] . "<br>";
    echo "Author: " . $row['author'] . "<br>";
    echo "Category: " . $row['category'] . "<br>";
    echo "Quantity: " . $row['quantity'] . "<br><br>";
}

?>