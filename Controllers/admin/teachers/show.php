<?php

// $user_number = generateUserId('student', 'teachers');

use Core\Database;

$db = new Database();
$grades = $db->query('SELECT * FROM grades')->findAll();



if (isset($_GET['teacher_type'])) {
    $teacher_type = $_GET['teacher_type'];
    $teachers = $db->query('SELECT * FROM teachers WHERE teacher_type = :teacher_type', [
        'teacher_type' => $_GET['teacher_type']
    ])->findAll();
} else {
    $teacher_type = NULL;
    $teachers = $db->query('SELECT * FROM teachers')->findAll();
}

// dd($teacher_type);

view('partials/admin/head.php', [
    'title' => 'Dashboard'
]);
view('partials/user/side-nav.php', [
    'grades' => $grades,
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);
view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('admin/teachers/show.view.php', [
    'name' => $_SESSION['user']['last_name'],
    'teachers' => $teachers,
    'teacher_type' => $teacher_type
]);
view('partials/footer.php');
