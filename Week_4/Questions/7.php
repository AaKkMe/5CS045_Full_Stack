<form method="post">
    Name: <input type="text" name="fname"><br>
    Email: <input type="text" name="email"><br>
    <button type="submit">Check</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['fname']) || empty($_POST['email'])) {
        echo "<span style='color:red'>Error: Fields cannot be empty.</span>";
    } else {
        echo "<span style='color:green'>All good!</span>";
    }
}
?>