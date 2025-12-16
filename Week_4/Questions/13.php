<form method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Pass: <input type="password" name="pass"><br>
    Confirm: <input type="password" name="cpass"><br>
    <button type="submit">Register</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if (empty($name) || empty($email) || empty($pass)) {
        echo "All fields required.";
    } elseif ($pass !== $cpass) {
        echo "Passwords do not match.";
    } else {
        $strength = (strlen($pass) > 8) ? "Strong" : "Weak";
        echo "<h3>Registration Preview:</h3>";
        echo "Name: $name <br>";
        echo "Email: $email <br>";
        echo "Password Strength: $strength";
    }
}
?>