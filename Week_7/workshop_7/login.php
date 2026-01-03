<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->execute([$student_id]);
    $user = $stmt->fetch();

    // UPDATED: Check 'password_hash' column
    if ($user && password_verify($password, $user['password_hash'])) {
        
        $_SESSION['logged_in'] = true;
        $_SESSION['student_id'] = $user['student_id'];
        
        // UPDATED: Store 'full_name' in session
        $_SESSION['name'] = $user['full_name']; 

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p style='color:red'>Invalid Student ID or Password</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Student Login</h2>
    <!-- Note: You cannot login with the dummy SQL data you provided 
         because those hashes ('$2y$10$Something') are fake. 
         Please Register a new user to test login. -->
    <form method="POST" action="">
        <input type="text" name="student_id" placeholder="Student ID" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>