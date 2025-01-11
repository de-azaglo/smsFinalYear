<?php

use Core\Database;

$db = new Database();

// Retrieve form data
$assignment_id = $_POST['assignment_id'];
$student_id = $_SESSION['user']['user_number']; // Replace with actual student ID from session

$is_submitted = $db->query("SELECT * FROM student_solutions WHERE assignment_id = :assignment_id AND student_id = :student_id", [
    'assignment_id' => $assignment_id,
    'student_id' => $student_id
])->rowCount();

if($is_submitted > 0){
    header('location: /student/assignments?error=You have submitted an assignment already');
    die();
}

// Handle file upload
$targetDir = "./resource/uploads/assignments/";
// $solution_file_path = $targetDir . basename($student_id . $_FILES["solution_file"]["name"]);
if (isset($_FILES['solution_file']) && $_FILES['solution_file']['error'] == 0) {
    $solution_file_path = $targetDir . basename($_FILES['solution_file']['name']);
    // dd($solution_file_path);
    move_uploaded_file($_FILES['solution_file']['tmp_name'], $solution_file_path);
}

// Insert solution into the database
$db->query("INSERT INTO student_solutions (assignment_id, student_id, solution_file_path, submission_date) VALUES (:assignment_id, :student_id, :solution_file_path, :date)",[
    'assignment_id' => $assignment_id,
    'student_id' => $student_id,
    'solution_file_path' => $solution_file_path,
    'date' => date('Y-m-d')
]);

header('location: /student/assignments');
die();
