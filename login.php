<?php
include "db.php";

if(!isset($_POST['email']) || !isset($_POST['password'])){
    echo "Please provide email and password";
    exit;
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$email = strtolower($email);

$sql = "SELECT * FROM users WHERE LOWER(email)='$email'";
$result = mysqli_query($conn, $sql) or die("Database Query Failed");

if (mysqli_num_rows($result) === 1) {

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        echo "Login Successful<br>"
        header("Location: index.html");
        exit;
    } else {
        echo "Incorrect password";
    }

} else {
    echo "Account not found";
}
?>
