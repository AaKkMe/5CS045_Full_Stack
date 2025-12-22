<?php
function formatName($name) {
    return ucwords(strtolower(trim($name)));
}

function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function cleanSkills($string) {
    $skills = explode(',', $string);
    $cleaned = array_map('trim', $skills);
    return $cleaned;
}

function saveStudent($name, $email, $skillsArray) {
    $skillsString = implode(', ', $skillsArray);
    $data = "$name | $email | $skillsString" . PHP_EOL;
    $file = fopen("students.txt", "a");
    if (!$file) {
        throw new Exception("Unable to open file!");
    }
    fwrite($file, $data);
    fclose($file);
}

function uploadPortfolioFile($file) {
    $targetDir = "uploads/";
    $fileName = basename($file["name"]);
    $fileSize = $file["size"];
    $fileTmp = $file["tmp_name"];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowed = ['pdf', 'jpg', 'png'];

    if (!in_array($fileExt, $allowed)) {
        throw new Exception("Invalid file type. Only PDF, JPG, PNG allowed.");
    }

    if ($fileSize > 2000000) {
        throw new Exception("File is too large. Max 2MB.");
    }

    $newName = "portfolio_" . time() . "." . $fileExt;
    $targetFile = $targetDir . $newName;

    if (move_uploaded_file($fileTmp, $targetFile)) {
        return "File uploaded successfully as $newName";
    } else {
        throw new Exception("Error moving file.");
    }
}
?>