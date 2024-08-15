<?php
// $user_number = generateUserId('student', 'teachers');

use Core\Database;

//dd($_SESSION);

$db = new Database();
$grade = $db->query('SELECT * FROM grades WHERE class_teacher_number = :user_id',[
    'user_id' => $_SESSION['user']['user_number']
])->find();

//dd($grade);
$number_of_students = $db->query('SELECT COUNT(*) AS row_count FROM students')->find();
$male_student = $db->query('SELECT COUNT(*) AS row_count FROM students WHERE gender = "Male"')->find();
$female_student = $db->query('SELECT COUNT(*) AS row_count FROM students WHERE gender = "Female"')->find();
$teachers = $db->query('SELECT * FROM teachers')->findAll();
$students = $db->query('SELECT * FROM students')->findAll();
$number_of_teachers = $db->query('SELECT COUNT(*) AS row_count FROM teachers')->find();
$today = date('Y-m-d');
$events = $db->query('SELECT * FROM events where start_date = :start_date',[
    'start_date' => $today
])->findAll();
$students_present = $db->query('SELECT * FROM attendance WHERE date = :today AND status = :status',[
    'today' => $today,
    'status' => 'Present'
])->fetchColumn();

//dd($female_student);





view('partials/facilitator/head.php', [
    'title' => 'Dashboard'
]);
view('partials/user/side-nav.php', [

    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);
view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('facilitator/dashboard.view.php', [
    'grade' => $grade,
    'teachers' => $teachers,
    'students' => $students,
    'events' => $events,
    'number_of_student' => $number_of_students['row_count'],
    'students_present' => $students_present,
    'number_of_teachers' => $number_of_teachers['row_count'],
    'male_student' => $male_student,
    'female_student' => $female_student
]);
view('partials/footer.php');

?>