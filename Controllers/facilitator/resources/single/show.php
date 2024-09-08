<?php
$title = 'Assignment';

use Core\Database;

$db = new Database();

$user_number = $_SESSION['user']['user_number'];

$id = isset($_GET['id']) ? $_GET['id'] : '';




$student = $db->query('SELECT * FROM students WHERE user_number = :user_number', [
    'user_number' => $user_number
])->find();
// dd($student);

$grade = $db->query("SELECT * FROM grades WHERE class_teacher_number = :id", [
    'id' => $user_number
])->find();


$assignment = $db->query(
    'SELECT a.id, a.title, a.description, a.due_date, a.subject_id, a.file_path, a.date_posted, sub.subject_title 
    FROM assignments a 
    JOIN subjects sub ON a.subject_id = sub.id
    where a.id = :id',
    [
        'id' => $id
    ]
)->find();

$submitted_solutions = $db->query(
    "SELECT ss.assignment_id, ss.student_id, ss.solution_file_path, ss.submission_date, st.first_name, st.other_name, st.last_name 
    FROM student_solutions ss
    JOIN students st ON ss.student_id = st.user_number
where assignment_id = :assignment_id", [
    'assignment_id' => $id
    ])->findAll();

    // dd()


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

view('facilitator/assignment/single/show.view.php', [
    'assignment' => $assignment,
    'submitted_solutions' => $submitted_solutions
]);
