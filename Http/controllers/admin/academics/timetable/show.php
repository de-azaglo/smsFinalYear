<?php
$title = 'Timetable';

use Core\Database;

$db = new Database();




if (isset($_GET['grade'])) {
    $class_id = $_GET['grade'];
} else {
    $class_id = 1;
}



$grade = $db->query("SELECT * FROM grades WHERE id = :id", [
    'id' => $class_id
])->find();

// dd($grade['id']);

$grades = $db->query("SELECT * FROM grades")->findAll();
$subjects = $db->query("SELECT * FROM subjects")->findAll();
$times = $db->query("SELECT * FROM time_periods")->findAll();
$days = $db->query("SELECT * FROM school_days")->findAll();



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

view('admin/academics/timetable/show.view.php', [
    'times' => $times,
    'days' => $days,
    'subjects' => $subjects,
    'grade' => $grade,
    'grades' => $grades,
]);


