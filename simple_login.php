<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if($email == "test@gmail.com" && $password == "1234"){
    $_SESSION['user'] = $email;
    header("Location: simple_dashboard.php");
} else {
    echo "Invalid login";
}
?>