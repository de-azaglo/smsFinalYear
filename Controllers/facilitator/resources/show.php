<?php
$title = 'Resources';

use Core\Database;

$db = new Database();

$user_number = $_SESSION['user']['user_number'];



$grade = $db->query("SELECT * FROM grades WHERE class_teacher_number = :id", [
    'id' => $user_number
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

view('facilitator/resources/show.view.php', [
    'resources' => $resources,
]);
