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
if (isset($_GET['term'])) {
    $term_id = $_GET['term'];
} else {
    $term_id = 1;
}



$students = $db->query(
    "SELECT * FROM students WHERE class_id = :class_id",
    [
        'class_id' => $class_id
    ]
)->findAll();


$grade = $db->query(
    "SELECT * FROM grades WHERE id = :id",
    [
        'id' => $class_id
    ]
)->find();

$grades = $db->query("SELECT * FROM grades")->findAll();
$year = $db->query("SELECT * FROM academic_year WHERE status = :status", [
    'status' => 'active'
])->find();


$terms = $db->query("SELECT * FROM terms where year = :year", [
    'year' => $year['year']
])->findAll();


function getAttendance($student_id, $term_id)
{
    $db = new Database();

    return $db->query(
        "SELECT * FROM attendance WHERE student_id = :student_id AND term_id = :term_id",
        [
            'student_id' => $student_id,
            'term_id' => $term_id
        ]
    )->fetchColumn();
}

function studentStatus($student_id, $term_id)
{
    $db = new Database();
    $status = $db->query(
        "SELECT * FROM attendance WHERE student_id = :student_id AND term_id = :term_id AND date = :date",
        [
            'student_id' => $student_id,
            'term_id' => $term_id,
            'date' => date("Y-m-d")
        ]
    )->find();
    if (!$status) {
        return "Not Set";
        die();
    }
    return $status['status'];
}




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

view('admin/attendance/show.view.php', [
    'grade' => $grade,
    'grades' => $grades,
    'students' => $students,
    'class_id' => $class_id,
    'terms' => $terms,
    'term_id' => $term_id
]);

view('partials/footer.php');
