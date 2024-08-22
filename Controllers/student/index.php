<?php
$title = 'Dashboard';

$name = $_SESSION['user']['last_name'];
$user_type = $_SESSION['user']['user_type'];


view('partials/head.php', [
    'title' => $title,
]);

view('partials/side-nav.php', [
    'name' => $name,
    'user_type' => $user_type
]);
view('partials/nav.php', [
    'name' => $name,
]);
view('student.view.php', [
    'name' => $name,
]);

