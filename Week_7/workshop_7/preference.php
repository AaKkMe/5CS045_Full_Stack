<?php
session_start();

// Check login
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// 7. Handle form submit to set cookie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme_value = $_POST['theme'];
    
    // Set cookie for 30 days
    setcookie('theme', $theme_value, time() + (86400 * 30), "/");
    
    // Refresh page to apply changes immediately
    header("Location: preference.php");
    exit();
}

// Read current theme for display
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
$bg_color = ($theme == 'dark') ? '#333' : '#fff';
$text_color = ($theme == 'dark') ? '#fff' : '#000';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Preferences</title>
    <style>
        body {
            background-color: <?php echo $bg_color; ?>;
            color: <?php echo $text_color; ?>;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        a { color: <?php echo ($theme == 'dark') ? '#81d4fa' : 'blue'; ?>; }
    </style>
</head>
<body>
    <h2>Theme Settings</h2>
    <p>Current Theme: <strong><?php echo ucfirst($theme); ?></strong></p>

    <form method="POST" action="">
        <label>Select Theme:</label>
        <select name="theme">
            <option value="light" <?php if($theme == 'light') echo 'selected'; ?>>Light Mode</option>
            <option value="dark" <?php if($theme == 'dark') echo 'selected'; ?>>Dark Mode</option>
        </select>
        <button type="submit">Save Preference</button>
    </form>

    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>