<?php include 'header.php'; ?>

<h2>Student List</h2>

<?php
if (file_exists("students.txt")) {
    $lines = file("students.txt");
    
    echo "<ul>";
    foreach ($lines as $line) {
        $parts = explode(" | ", $line);
        
        if (count($parts) == 3) {
            $name = $parts[0];
            $email = $parts[1];
            $skillsString = $parts[2];
            
            $skillsArray = explode(", ", trim($skillsString));
            
            echo "<li>";
            echo "<strong>Name:</strong> $name <br>";
            echo "<strong>Email:</strong> $email <br>";
            
            echo "<strong>Skills:</strong> " . implode(", ", $skillsArray); 
            
            echo "</li><br>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>No students found.</p>";
}
?>

<?php include 'footer.php'; ?>