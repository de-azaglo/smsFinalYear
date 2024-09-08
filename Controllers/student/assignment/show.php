<?php
$title = 'Assignment';

use Core\Database;

$db = new Database();

$user_number = $_SESSION['user']['user_number'];




$student = $db->query('SELECT * FROM students WHERE user_number = :user_number', [
    'user_number' => $user_number
])->find();
// dd($student);

$grade = $db->query("SELECT * FROM grades WHERE id = :id",[
    'id' => $student['class_id']
])->find();

$sql = "SELECT a.*, 
        (SELECT COUNT(*) 
         FROM student_solutions ss 
         WHERE ss.assignment_id = a.id 
         AND ss.student_id = ?) as is_submitted 
        FROM assignments a ORDER BY due_date DESC";

$assignments = $db->query(
    'SELECT a.id, a.title, a.description, a.due_date, a.subject_id, a.file_path, sub.subject_title 
    FROM assignments a 
    JOIN subjects sub ON a.subject_id = sub.id
    where class_id = :class_id',[
    'class_id' => $student['class_id']
])->findAll();

function is_submitted($assignment_id, $student_id){
    $db = new Database();

   $rowCount = $db->query("SELECT * FROM student_solutions where assignment_id = :assignment_id AND student_id = :student_id",[
        'assignment_id' => $assignment_id,
        'student_id' => $student_id
    ])->rowCount();

    if($rowCount > 0){
        return true;
    }else{
        return false;
    }
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

view('student/assignment/show.view.php', [
    'assignments' => $assignments,
]);
