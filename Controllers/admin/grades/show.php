<?php
$title = 'Grades';

use Core\Database;

$db = new Database();
$grades = $db->query('SELECT * FROM grades')->findAll();
$class_teachers = $db->query('SELECT * FROM class_teachers')->findAll();

function teacher($user_number)
{
    $db = new Database();
    return $db->query("SELECT * FROM teachers WHERE user_number = :user_number", [
        'user_number' => $user_number
    ])->find();
}

function number_of_students($grade)
{
    $db = new Database();
    return $db->query("SELECT * FROM students WHERE class_id = :class_id", [
        'class_id' => $grade
    ])->fetchColumn();
}

// $teacher = $db->query("SELECT * FROM teachers WHERE user_number = :user_number",[
//     'user_number' => 'TEA001'
// ])->find();

// dd($teacher);
// dd(teacher('TEA001'));

view('partials/admin/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'grades' => $grades,
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('admin/grades/show.view.php', [
    'grades' => $grades
]);

view('partials/footer.php');
