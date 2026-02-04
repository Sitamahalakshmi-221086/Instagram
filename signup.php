
<?php

include "db.php";


if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    die("Form data missing");
}


$username = trim($_POST['username']);
$email    = trim($_POST['email']);
$password = trim($_POST['password']);

$username = strtolower($username);
$username = preg_replace("/[^a-z0-9_]/", "", $username);


if (strlen($username) < 3 || strlen($username) > 20) {
    die("Username must be between 3 and 20 characters");
}

if (strlen($password) < 6) {
    die("Password must be at least 6 characters long");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$check = "SELECT * FROM users WHERE email='$email' OR username='$username'";
$result = mysqli_query($conn, $check) or die("Database error");

if (mysqli_num_rows($result) > 0) {
    die("User already exists");
}


$sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$hashedPassword')";

if (mysqli_query($conn, $sql)) {
    echo "Signup successful";
    header("Location: index.html");
    exit;
} else {
    die("Signup failed");
}
?>