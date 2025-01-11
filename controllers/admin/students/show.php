<?php
$title = 'Grades';

use Core\Database;

$db = new Database();

// $grade = $db->query('SELECT * FROM grades WHERE id = :grade_id', [
//     'grade_id' => $grade_id
// ])->findAll();


if (isset($_GET['grade'])) {
    $class_id = $_GET['grade'];
} else {
    $class_id = 1;
}



$students = $db->query("SELECT * FROM students WHERE class_id = :class_id", [
    'class_id' => $class_id
])->findAll();



$grade = $db->query("SELECT * FROM grades WHERE id = :id", [
    'id' => $class_id
])->find();

$grades = $db->query("SELECT * FROM grades")->findAll();






view('partials/admin/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('admin/students/show.view.php', [
    'grade' => $grade,
    'grades' => $grades,
    'students' => $students,
    'class_id' => $class_id
]);


