<?php

// $user_number = generateUserId('student', 'teachers');

use Core\Database;

$db = new Database();

$user_number = $_SESSION['user']['user_number'];




$student = $db->query('SELECT * FROM students WHERE parent_id = :user_number', [
    'user_number' => $user_number
])->find();
// dd($student);

$grade = $db->query("SELECT * FROM grades WHERE id = :id", [
    'id' => $student['class_id']
])->find();


$today = date('Y-m-d');

$events = $db->query('SELECT * FROM events where start_date = :start_date',[
    'start_date' => $today
])->findAll();


$full_date = date('l, d-m-Y');
$active_year = $db->query("SELECT * FROM academic_year WHERE status='active'")->find();
$active_term = $db->query("SELECT * FROM terms WHERE status='active'")->find();
$attendances = $db->query('SELECT * FROM attendance WHERE student_id = :student_id AND academic_year = :active_year AND term_id = :active_term',[
    'student_id' => $student['user_number'],
    'active_year' => $active_year['year'],
    'active_term' => $active_term['id'],
])->findAll();

$attendance_status = [];

foreach($attendances as $attendance){
$attendance_status[] = [
    'title' => $attendance['status'],
    'start' => $attendance['date'],
    'className' => strtolower($attendance['status'])
];
}






view('partials/student/head.php', [
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

view('parent/dashboard.view.php', [
    'name' => $_SESSION['user']['last_name'],
    'attendance_status' => $attendance_status
   
]);
