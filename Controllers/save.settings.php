<?php
$title = 'Settings';

use Core\Database;

$db = new Database();

$password = $_POST['password'];


$db->query("UPDATE users SET password = :password  WHERE user_number = :user_number", [
    'user_number' => $_SESSION['user']['user_number'],
    'password' => $password
]);
$alert = "Password Changed Successfully";
header('location: /settings?alert=' .$alert);
