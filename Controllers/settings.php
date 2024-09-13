<?php
$title = 'Settings';

use Core\Database;

$db = new Database();



$alert = isset($_GET['alert']) ? $_GET['alert'] : '';

$user = $db->query("SELECT * FROM users WHERE user_number = :user_number", [
    'user_number' => $_SESSION['user']['user_number']
]);






view('partials/student/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('settings.view.php', [
    'user' => $user,
    'alert' => $alert
]);
