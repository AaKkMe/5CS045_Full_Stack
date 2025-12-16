<?php
$users = [
    ["email" => "fweonfwe@gmail.com"],
    ["email" => "sita@gmail.com"],
    ["email" => "hari@gmail.com"]
];

$newEmail = "sita@gmail.com"; 
$exists = false;

foreach ($users as $user) {
    if ($user['email'] === $newEmail) {
        $exists = true;
        break;
    }
}

if ($exists) {
    echo "Email already exists";
} else {
    echo "Email available";
}
?>