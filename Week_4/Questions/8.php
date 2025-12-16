<form method="post">
    Email: <input type="text" name="email">
    <button type="submit">Validate</button>
</form>

<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $hasAt = strpos($email, '@');
    $hasDot = strpos($email, '.');
    
    // Check constraints
    if ($hasAt !== false && $hasDot !== false && $email[0] != '@') {
        echo "Email format looks okay.";
    } else {
        echo "Email format incorrect (basic check).";
    }
}
?>