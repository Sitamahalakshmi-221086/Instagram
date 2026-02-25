<?php
session_start();

/* Check token */
if (!isset($_POST['credential'])) {
    die("No credential received");
}

$id_token = $_POST['credential'];

/* Split JWT */
$parts = explode(".", $id_token);

if (count($parts) !== 3) {
    die("Invalid token format");
}

/* Decode payload */
$payload = $parts[1];
$payload = str_replace(['-', '_'], ['+', '/'], $payload);

/* Fix padding */
$padding = strlen($payload) % 4;
if ($padding > 0) {
    $payload .= str_repeat('=', 4 - $padding);
}

$decoded = json_decode(base64_decode($payload), true);

if (!$decoded) {
    die("Token decode failed");
}

/* Store user data in session */
$_SESSION['user_name']  = $decoded['name'] ?? '';
$_SESSION['user_email'] = $decoded['email'] ?? '';
$_SESSION['google_id']  = $decoded['sub'] ?? '';

/* 🔥 IMPORTANT: Use absolute URL */
header("Location: http://localhost/Instagram/index.html");
exit();

?>