<?php
$title = 'Resources';

use Core\Database;

$db = new Database();

$user_number = $_SESSION['user']['user_number'];



$student = $db->query("SELECT * FROM students WHERE user_number = :id", [
    'id' => $user_number
])->find();

$grade = $db->query("SELECT * FROM grades WHERE id = :id", [
    'id' => $student['class_id']
])->find();


$resources = $db->query(
    'SELECT r.id, r.title, r.description, r.uploaded_at, r.subject_id, r.file_path, sub.subject_title 
    FROM learning_materials r 
    JOIN subjects sub ON r.subject_id = sub.id
    where class_id = :class_id',
    [
        'class_id' => $grade['id']
    ]
)->findAll();




view('partials/student/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('student/resources/show.view.php', [
    'resources' => $resources,
]);
