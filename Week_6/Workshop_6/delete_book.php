<?php

include 'connection.php';

$sql = "DELETE FROM books where title = '$_POST[title]'";
'$_POST[title] = title';

mysqli_query($conn, $sql);

?>