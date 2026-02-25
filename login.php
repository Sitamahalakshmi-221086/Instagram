



<?php
include "db.php";
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE LOWER(email)=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            header("Location: index.html");
            exit;
        }else{
            echo "Incorrect password";
        }
    }else{
        echo "Account not found";
    }
}

// Google OAuth login URL
$googleClient = new Google_Client();
$googleClient->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$googleClient->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$googleClient->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);
$googleClient->addScope("email");
$googleClient->addScope("profile");

$googleLoginUrl = $googleClient->createAuthUrl();
?>