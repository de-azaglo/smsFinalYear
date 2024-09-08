<?php
$title = 'Assignment';

use Core\Database;

$db = new Database();


$grade = $db->query('SELECT * FROM grades WHERE class_teacher_number = :user_id', [
    'user_id' => $_SESSION['user']['user_number']
])->find();

$students = $db->query('SELECT * FROM students WHERE class_id = :class_id', [
    'class_id' => $grade['id']
])->findAll();

$jhs_subjects = $db->query('SELECT * FROM subjects WHERE examinable = "true" AND id NOT IN (7, 9)')->findAll();

$primary_subjects = $db->query('SELECT * FROM subjects WHERE examinable = "true" AND id NOT IN (23)')->findAll();


if ($grade['id'] <= 7) {
    $subjects = $primary_subjects;
} else {
    $subjects = $primary_subjects;
}







view('partials/facilitator/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('facilitator/assignment/create.view.php', [
    'students' => $students,
    'subjects' => $subjects
    // 'events' => $events
]);
