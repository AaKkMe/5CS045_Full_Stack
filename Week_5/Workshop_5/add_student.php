<?php 
include 'header.php'; 
include 'functions.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = formatName($_POST['name']);
        $email = $_POST['email'];
        $skillsInput = $_POST['skills'];

        if (!validateEmail($email)) {
            throw new Exception("Invalid email address format.");
        }

        if (empty($name) || empty($skillsInput)) {
            throw new Exception("All fields are required.");
        }

        $skillsArray = cleanSkills($skillsInput);
        
        saveStudent($name, $email, $skillsArray);
        
        $message = "<p class='success'>Student saved successfully!</p>";

    } catch (Exception $e) {
        $message = "<p class='error'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Add Student Info</h2>
<?php echo $message; ?>

<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Skills (comma separated):</label>
    <input type="text" name="skills" placeholder="PHP, HTML, CSS" required>
    
    <button type="submit">Save Student</button>
</form>

<?php include 'footer.php'; ?>