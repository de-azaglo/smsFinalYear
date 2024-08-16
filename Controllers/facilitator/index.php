<?php
// $user_number = generateUserId('student', 'teachers');

use Core\Database;

//dd($_SESSION);



$db = new Database();
$grade = $db->query('SELECT * FROM grades WHERE class_teacher_number = :user_id',[
    'user_id' => $_SESSION['user']['user_number']
])->find();

//dd($grade);
$students = $db->query('SELECT * FROM students WHERE class_id = :class_id',[
    'class_id' => $grade['id']
])->findAll();
$male_student = $db->query('SELECT * FROM students WHERE gender = "Male"')->rowCount();
$female_student = $db->query('SELECT * FROM students WHERE gender = "Female"')->rowCount();
$number_of_teachers = $db->query('SELECT *  FROM teachers')->rowCount();
 $today = date('Y-m-d');
$full_date = date('l, d-m-Y');
$events = $db->query('SELECT * FROM events where start_date = :start_date',[
    'start_date' => $today
])->findAll();

$students_present = $db->query('SELECT * FROM attendance WHERE date = :today AND status = :status AND class_id = :class_id',[
    'today' => $today,
    'status' => 'Present',
    'class_id' => $grade['id']
])->rowCount();


$academic_year = $db->query('SELECT * FROM academic_year where status = "active"')->find();
$active_term = $db->query('SELECT * FROM terms where status = "active"')->find();






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

view('facilitator/dashboard.view.php', [
    'grade' => $grade,
    'events' => $events,
    'today' => $today,
    'academic_year' => $academic_year['year'],
    'active_term' =>$active_term['id'],
    'students' =>$students ,
    'students_present' => $students_present,
    'number_of_teachers' => $number_of_teachers,
    'male_student' => $male_student,
    'female_student' => $female_student
]);
view('partials/footer.php');

