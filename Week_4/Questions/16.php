<form method="post">
    Username: <input type="text" name="user"><br>
    Password: <input type="text" name="pass"><br>
    <button type="submit">Login</button>
</form>

<?php
if (isset($_POST['user'])) {
    $u = $_POST['user'];
    $p = $_POST['pass'];
    
    if ($u === "admin" && $p === "1234@admin") {
        echo "Welcome Admin";
    } else {
        echo "Invalid credentials";
    }
}
?>