<?php

use Core\Database;

$db = new Database();

// $grades = $db->query('SELECT * FROM grades')->findAll();
$years = $db->query('SELECT * FROM academic_year')->findAll();



$title = 'Add Event';

$alert = isset($_GET['alert']) ? urldecode($_GET['alert']) : NULL;


view('partials/admin/head.php', [
    'title' => $title
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);


if (isset($alert)) {
    view('admin/academics/event/create.view.php', [
        'years' => $years,
        'alert' => $alert
    ]);
} else {
    view('admin/academics/event/create.view.php', [
        'years' => $years
    ]);
}

view('partials/footer.php');
