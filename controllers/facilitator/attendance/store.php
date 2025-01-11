<?php
use Core\Database;

$db = new Database();


$date = date('Y-m-d');
$status = $_POST['status'];
$student_id = $_POST['student_id'];
$class_id = $_POST['class_id'];
$academic_year = $_POST['academic_year'];
$term = $_POST['term'];

$marked = $db->query("SELECT * FROM attendance WHERE student_id = :student_id AND date= :date",[
    'student_id' => $student_id,
    'date' => $date
])->find();


if($marked){
    $db->query("UPDATE attendance SET status = :status WHERE id= :id",[
       'status' => $status,
       'id' => $marked['id']
    ]);
    die();
}
$db->query("INSERT INTO attendance (student_id, class_id, academic_year, term_id, date, status) VALUE (:student_id, :class_id, :academic_year, :term_id, :date, :status)",[
    'student_id' => $student_id,
    'class_id' => $class_id,
    'academic_year' => $academic_year,
    'term_id' => $term,
    'date' => $date,
    'status' => $status
]);


//header("Location: /facilitator/dashboard");
die();

