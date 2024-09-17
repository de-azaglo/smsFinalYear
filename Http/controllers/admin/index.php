<?php

// $user_number = generateUserId('student', 'teachers');

use Core\Database;

$db = new Database();
$grades = $db->query('SELECT * FROM grades')->findAll(); 
$number_of_students = $db->query('SELECT * FROM students')->rowCount();
$male_student = $db->query('SELECT * FROM students WHERE gender = "Male"')->rowCount();
$female_student = $db->query('SELECT* FROM students WHERE gender = "Female"')->rowCount();
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

//dd($female_student);





view('partials/admin/head.php', [
    'title' => 'Dashboard'
]);
view('partials/user/side-nav.php', [
    'grades' => $grades,
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);
view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'full_date' => $full_date
]);

view('admin/dashboard.view.php', [
    'name' => $_SESSION['user']['last_name'],
    'teachers' => $teachers,
    'students' => $students,
    'events' => $events,
    'number_of_student' => $number_of_students,
    'students_present' => $students_present,
    'number_of_teachers' => $number_of_teachers,
    'male_student' => $male_student,
    'female_student' => $female_student
]);

