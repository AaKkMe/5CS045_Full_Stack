<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $name = $_POST['full_name']; // Matches form input name
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // UPDATED SQL: Uses 'full_name' and 'password_hash' columns
    $sql = "INSERT INTO students (student_id, full_name, password_hash) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        if ($stmt->execute([$student_id, $name, $hashed_password])) {
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h2>Register Student</h2>
    <form method="POST" action="">
        <input type="text" name="student_id" placeholder="Student ID" required><br><br>
        <!-- Changed input name to full_name for clarity -->
        <input type="text" name="full_name" placeholder="Full Name" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>