<?php
$title = 'Timetable';

use Core\Database;

$db = new Database();





if (isset($_GET['grade'])) {
    $class_id = $_GET['grade'];
} else {
    $class_id = 1;
}

$year = $db->query("SELECT * FROM academic_year WHERE status = :status", [
    'status' => "active"
])->find();

$grade = $db->query("SELECT * FROM grades WHERE id = :id", [
    'id' => $class_id
])->find();

$grades = $db->query("SELECT * FROM grades")->findAll();
$subjects = $db->query("SELECT * FROM subjects")->findAll();
$times = $db->query("SELECT * FROM time_periods")->findAll();
$days = $db->query("SELECT * FROM school_days")->findAll();

// dd($days);





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

view('admin/academics/timetable/create.view.php', [
    'year' => $year,
    'times' => $times,
    'days' => $days,
    'subjects' => $subjects,
    'grade' => $grade,
    'grades' => $grades,
    'events' => $events
]);

view('partials/footer.php');
