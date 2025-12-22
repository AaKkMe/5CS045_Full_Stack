<?php 
include 'header.php'; 
include 'functions.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["portfolio"])) {
    try {
        $result = uploadPortfolioFile($_FILES["portfolio"]);
        $message = "<p class='success'>$result</p>";
    } catch (Exception $e) {
        $message = "<p class='error'>Upload Failed: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Upload Portfolio File</h2>
<?php echo $message; ?>

<form method="post" enctype="multipart/form-data">
    <label>Select File (PDF, JPG, PNG only, Max 2MB):</label>
    <input type="file" name="portfolio" required>
    <button type="submit">Upload</button>
</form>

<?php include 'footer.php'; ?>