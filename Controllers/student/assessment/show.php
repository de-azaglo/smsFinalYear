<?php
$title = 'Assessment';

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


if($grade['id'] <= 7 ){
    $subjects = $primary_subjects;

} else {
    $subjects = $primary_subjects;
}

$assessment = $db->query('SELECT s.first_name, s.other_name, s.last_name, subj.subject_title, a.class_score, a.exam_weighted
FROM assessment a
JOIN students s ON a.student_id = s.user_number
JOIN subjects subj ON a.subject_id = subj.id
WHERE a.class_id = :class_id',[
    'class_id' => $grade['id']
])->findAll();

function getScore($student_id, $subject_id, $score_type){
    $db = new Database();

   return $db->query('SELECT ' .$score_type. ' FROM assessment WHERE student_id = :student_id AND subject_id = :subject_id',[
        'student_id' => $student_id,
        'subject_id' => $subject_id
    ])->find();
}

// dd($assessment);



// $year = $db->query("SELECT * FROM academic_year WHERE status = :status",[
//     'status' => "active"
// ])->find();

// $events = $db->query("SELECT * FROM events WHERE year = :year ORDER BY start_date", [
//     'year' => $year['year']
// ])->findAll();

// dd($events);







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

view('facilitator/assessment/show.view.php', [
    'students' => $students,
    'subjects' => $subjects
    // 'events' => $events
]);
