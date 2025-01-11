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

$user_number = $_SESSION['user']['user_number'];
$student = $db->query('SELECT * FROM students WHERE parent_id = :user_number', [
    'user_number' => $user_number
])->find();
// dd($student);




// $grade_id = $db->query("SELECT * FROM students WHERE user_number = :user_number",[
//     'user_number' => $student['user_number']
// ])->find();

$grade = $db->query("SELECT * FROM grades WHERE id = :id", [
    'id' => $student['class_id']
])->find();


view('partials/student/head.php', [
    'title' => $title
]);
view('partials/user/side-nav.php', [

    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);
view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'full_date' => $full_date
]);
view('parent/timetable/show.view.php', [
    'times' => $times,
    'days' => $days,
    'subjects' => $subjects,
    'grade' => $grade,
    // 'class_id' => $class
]);