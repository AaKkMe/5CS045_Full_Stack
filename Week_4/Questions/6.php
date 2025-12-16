<form method="post">
    Name: <input type="text" name="name"><br>
    Age: <input type="number" name="age"><br>
    Language: <input type="text" name="lang"><br>
    <button type="submit">Submit</button>
</form>

<?php
if (!empty($_POST['name'])) {
    echo "<h3>Preview:</h3>";
    echo "Name: " . $_POST['name'] . "<br>";
    echo "Age: " . $_POST['age'] . "<br>";
    echo "Language: " . $_POST['lang'];
}
?>