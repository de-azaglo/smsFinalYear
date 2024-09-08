<?php

// $user_number = generateUserId('student', 'teachers');

use Core\Database;

$db = new Database();

$teachers = $db->query('SELECT * FROM teachers')->findAll();
$students = $db->query('SELECT * FROM students')->findAll();
$number_of_teachers = $db->query('SELECT * FROM teachers')->rowCount();
$today = date('Y-m-d');
$events = $db->query('SELECT * FROM events where start_date = :start_date',[
    'start_date' => $today
])->findAll();
$students_present = $db->query('SELECT * FROM attendance WHERE date = :today AND status = :status',[
    'today' => $today,
    'status' => 'Present'
])->fetchColumn();
$full_date = date('l, d-m-Y');
$active_year = $db->query("SELECT * FROM academic_year WHERE status='active'")->find();
$active_term = $db->query("SELECT * FROM terms WHERE status='active'")->find();
$attendances = $db->query('SELECT * FROM attendance WHERE student_id = :student_id AND academic_year = :active_year AND term_id = :active_term',[
    'student_id' => $_SESSION['user']['user_number'],
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

view('student/dashboard.view.php', [
    'name' => $_SESSION['user']['last_name'],
    'teachers' => $teachers,
    'students' => $students,
    'attendance_status' => $attendance_status
   
]);

