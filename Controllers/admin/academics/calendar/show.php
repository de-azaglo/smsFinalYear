<?php
$title = 'Grades';

use Core\Database;

$db = new Database();





$year = $db->query("SELECT * FROM academic_year WHERE status = :status",[
    'status' => "active"
])->find();


$events = $db->query("SELECT * FROM events WHERE year = :year ORDER BY start_date", [
    'year' => $year['year']
])->findAll();

// dd($events);







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

view('admin/academics/calendar/show.view.php', [
    'year' => $year,
    'events' => $events
]);
