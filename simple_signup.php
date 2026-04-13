<?php
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';

echo "Signup successful<br>";
echo $username . "<br>";
echo $email;
?>