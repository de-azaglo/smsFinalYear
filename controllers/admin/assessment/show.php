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

$assessment = $db->query('SELECT s.first_name, s.other_name, s.last_name, subj.subject_title, a.class_score, a.exam_weighted
FROM assessment a
JOIN students s ON a.student_id = s.user_number
JOIN subjects subj ON a.subject_id = subj.id
WHERE a.class_id = :class_id', [
    'class_id' => $grade['id']
])->findAll();


function getScore($student_id, $subject_id, $score_type, $term_id)
{

    $db = new Database();


    return $db->query('SELECT ' . $score_type . ' FROM assessment WHERE student_id = :student_id AND subject_id = :subject_id AND term_id = :active_term', [
        'student_id' => $student_id,
        'subject_id' => $subject_id,
        'active_term' => $term_id
    ])->find();
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

view('admin/assessment/show.view.php', [
    'grade' => $grade,
    'grades' => $grades,
    'students' => $students,
    'class_id' => $class_id,
    'terms' => $terms,
    // 'term_id' => $term_id,
    'subjects' => $subjects
]);
