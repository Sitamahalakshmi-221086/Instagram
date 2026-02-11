<?php
$uploadedFileName = "myfile";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] == 0) {

        $fileName = $_FILES['myfile']['name'];
        $tempName = $_FILES['myfile']['tmp_name'];
        $uploadFolder = "uploads/";

        // Create unique file name to avoid overwrite
        $newFileName = time() . "_" . $fileName;

        if (move_uploaded_file($tempName, $uploadFolder . $newFileName)) {
            $uploadedFileName = $newFileName;
            echo "<p style='color:green;'>File uploaded successfully!</p>";
        } else {
            echo "<p style='color:red;'>File upload failed!</p>";
        }

    } else {
        echo "<p style='color:red;'>Please select a file.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>

<h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <br><br>
    <button type="submit">Upload</button>
</form>

<?php if ($uploadedFileName != ""): ?>
    <br>
    <a href="download.php?file=<?php echo $uploadedFileName; ?>">
        <button>Download File</button>
    </a>
<?php endif; ?>

</body>
</html>