<?php
// Backend signup logic
include "db.php";

// CHANGE: getting values from signup.html
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// CHANGE: check if user already exists
$check = "SELECT * FROM users WHERE email='$email' OR username='$username'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    echo "User already exists";
    exit;
}

// CHANGE: insert user into database
$sql = "INSERT INTO users (username,email,password)
        VALUES ('$username','$email','$password')";

if (mysqli_query($conn, $sql)) {
    // CHANGE: redirect to instagram homepage
    header("Location: index.html");
} else {
    echo "Signup failed";
}
?>
