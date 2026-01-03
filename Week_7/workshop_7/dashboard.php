<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
$bg_color = ($theme == 'dark') ? '#333' : '#fff';
$text_color = ($theme == 'dark') ? '#fff' : '#000';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color: <?php echo $bg_color; ?>;
            color: <?php echo $text_color; ?>;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- This will display the full_name stored during login -->
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
    <p>You have successfully logged in.</p>
    
    <hr>
    <ul>
        <li><a href="preference.php">Change Theme Preference</a></li>
        <li><a href="dashboard.php?logout=true">Logout</a></li>
    </ul>
</body>
</html>