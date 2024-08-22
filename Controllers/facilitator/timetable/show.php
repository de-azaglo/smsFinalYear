<?php
use Core\Database;
$title = 'Timetable';

$db = new Database();

// dd($_SESSION);







// dd($grade['id']);


$subjects = $db->query("SELECT * FROM subjects")->findAll();
$times = $db->query("SELECT * FROM time_periods")->findAll();
$days = $db->query("SELECT * FROM school_days")->findAll();
$full_date = date('l, d-m-Y');
$grade = $db->query("SELECT * FROM grades WHERE class_teacher_number = :user_number",[
    'user_number' => $_SESSION['user']['user_number']
])->find();

view('partials/facilitator/head.php', [
    'title' => 'Dashboard'
]);
view('partials/user/side-nav.php', [

    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);
view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'full_date' => $full_date
]);
view('facilitator/timetable/show.view.php', [
    'times' => $times,
    'days' => $days,
    'subjects' => $subjects,
    'grade' => $grade,
    // 'class_id' => $class
]);