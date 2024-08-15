<?php
$title = 'Academic Year';

use Core\Database;

$db = new Database();



$years = $db->query("SELECT * FROM academic_year")->findAll();





view('partials/admin/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('admin/academics/year/show.view.php', [
    'years' => $years,

]);

view('partials/footer.php');
