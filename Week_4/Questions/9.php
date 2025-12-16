<form method="post">
    Password: <input type="text" name="pass">
    <button type="submit">Validate</button>
</form>

<?php
if (isset($_POST['pass'])) {
    $p = $_POST['pass'];
    
    if (strlen($p) < 8) echo "Must be at least 8 chars.<br>";
    if (!preg_match('/[0-9]/', $p)) echo "Must include a number.<br>";
    if (!preg_match('/[\W]/', $p)) echo "Must include a special char.<br>";
    
    if (strlen($p) >= 8 && preg_match('/[0-9]/', $p) && preg_match('/[\W]/', $p)) {
        echo "Password is valid.";
    }
}
?>