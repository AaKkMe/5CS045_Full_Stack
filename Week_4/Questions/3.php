<form method="post">
    Number: <input type="number" name="num">
    <button type="submit">Generate</button>
</form>

<?php
if (isset($_POST['num'])) {
    $num = $_POST['num'];
    for ($i = 1; $i <= 10; $i++) {
        echo "$num x $i = " . ($num * $i) . "<br>";
    }
}
?>