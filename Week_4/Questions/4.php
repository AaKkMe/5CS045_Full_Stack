<form method="post">
    Word: <input type="text" name="word">
    <button type="submit">Reverse</button>
</form>

<?php
if (isset($_POST['word'])) {
    $str = $_POST['word'];
    $len = strlen($str);
    echo "Reversed: ";
    for ($i = $len - 1; $i >= 0; $i--) {
        echo $str[$i];
    }
}
?>