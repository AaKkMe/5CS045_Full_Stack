<?php
$name = $email = "";
$nameErr = $emailErr = $passErr = $cPassErr = $msg = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $pass = $_POST["pass"];
    $cPass = $_POST["cpass"];

    
    // Name check
    if (empty($name)) {
        $nameErr = "Yo, you need a name.";
        $isValid = false;
    }

    // Email check
    if (empty($email)) {
        $emailErr = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "That doesn't look like a real email.";
        $isValid = false;
    }

    // Password rules
    if (empty($pass)) {
        $passErr = "Password can't be empty.";
        $isValid = false;
    } elseif (strlen($pass) < 8 || !preg_match("/[\W]/", $pass)) {
        $passErr = "Weak password! Needs 8 chars and a special symbol like @ or !.";
        $isValid = false;
    }

    if ($pass !== $cPass) {
        $cPassErr = "Passwords don't match, try again.";
        $isValid = false;
    }
    if ($isValid) {
        
        $file = 'users.json';
        if (file_exists($file)) {
            
            $currentData = file_get_contents($file);
            $arrayData = json_decode($currentData, true);
            
            if ($arrayData === null) {
                $arrayData = [];
            }



            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);



            $newUser = [
                "name" => $name,
                "email" => $email,
                "password" => $hashedPass
            ];

            $arrayData[] = $newUser;



            if (file_put_contents($file, json_encode($arrayData, JSON_PRETTY_PRINT))) {
                $msg = "<div style='color:green; padding:10px; border:1px solid green;'>Success! You are registered.</div>";


                $name = $email = "";
            } else {
                $msg = "<div style='color:red;'>Error writing to file. Check permissions!</div>";
            }

        } else {
            $msg = "<div style='color:red;'>Error: users.json file is missing!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .error { color: red; font-size: 0.9em; }
        input { display: block; margin-bottom: 5px; padding: 5px; width: 300px; }
        button { padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>

    <h2>User Registration</h2>
    
    <?php echo $msg; ?>

    <form method="post" action="">
        
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <span class="error"><?php echo $nameErr; ?></span>
        <br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $emailErr; ?></span>
        <br>

        <label>Password:</label>
        <input type="password" name="pass">
        <span class="error"><?php echo $passErr; ?></span>
        <br>

        <label>Confirm Password:</label>
        <input type="password" name="cpass">
        <span class="error"><?php echo $cPassErr; ?></span>
        <br>

        <button type="submit" name="submit">Register Now</button>

    </form>

</body>
</html>