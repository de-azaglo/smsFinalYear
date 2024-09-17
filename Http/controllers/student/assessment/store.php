<?php

use Core\Database;

$db = new Database();

$subject_id =  $_POST["subject_id"];
$student_id =  $_POST["student_id"];
$grade = $db->query('SELECT * FROM grades WHERE class_teacher_number = :user_id', [
    'user_id' => $_SESSION['user']['user_number']
])->find();

$assessment = $db->query("SELECT * FROM assessment WHERE student_id = :student_id AND subject_id = :subject_id", [
    'student_id' => $student_id,
    'subject_id' => $subject_id
])->rowCount();

if ($assessment > 0) {
    if (isset($_POST["class_score"])) {
        $midsem_score =  $_POST["class_score"];
        $class_score = (int) round($midsem_score * 0.4);

        $exam_weighted = $db->query("SELECT exam_weighted FROM assessment WHERE student_id = :student_id AND subject_id = :subject_id", [
            'student_id' => $student_id,
            'subject_id' => $subject_id,
        ])->find();

        

        $final_score = $exam_weighted['exam_weighted'] + $class_score;



        $db->query("UPDATE assessment SET class_score = :class_score, midsem_score = :midsem_score, final_score = :final_score  WHERE student_id = :student_id AND subject_id = :subject_id", [
            'student_id' => $student_id,
            'subject_id' => $subject_id,
            'class_score' => $class_score,
            'midsem_score' => $midsem_score,
            'final_score' => $final_score
        ]);

        header('location: /facilitator/assessment');
        die();
    }
    if (isset($_POST["exam_score"])) {
        $exam_score =  $_POST["exam_score"];
        $exam_weighted = (int) round($exam_score * 0.6);

        $class_score = $db->query("SELECT class_score FROM assessment WHERE student_id = :student_id AND subject_id = :subject_id", [
            'student_id' => $student_id,
            'subject_id' => $subject_id,
        ])->find();

        $final_score = $exam_weighted + $class_score['class_score'];


        $db->query("UPDATE assessment SET exam_score = :exam_score, exam_weighted = :exam_weighted, final_score = :final_score WHERE student_id = :student_id AND subject_id = :subject_id", [
            'student_id' => $student_id,
            'subject_id' => $subject_id,
            'exam_score' => $exam_score,
            'exam_weighted' => $exam_weighted,
            'final_score' => $final_score
        ]);
        header('location: /facilitator/assessment');
        die();
    }

    die();
}
$term = $db->query("SELECT * FROM terms where year = :year AND status = 'active'", [
    'year' => $year['year']
])->findAll();


if($assessment < 1){
    if (isset($_POST["class_score"])) {
        $midsem_score =  $_POST["class_score"];
        $class_score =  round($midsem_score * 0.4);
        $db->query("INSERT INTO assessment (student_id, subject_id, class_id, midsem_score, class_score, term_id) VALUES (:student_id, :subject_id, :class_id, :midsem_score ,:class_score, :term_id)", [
            'student_id' => $student_id,
            'subject_id' => $subject_id,
            'class_id' => $grade['id'],
            'midsem_score' => $midsem_score,
            'class_score' => $class_score,
            'term_id' => $term['id']
        ]);
        header('location: /facilitator/assessment');
        die();
    }
    if (isset($_POST["exam_score"])) {
        $exam_score =  $_POST["exam_score"];
        $exam_weighted = round($exam_score * 0.6);
        $db->query("INSERT INTO assessment (student_id, subject_id, class_id, exam_weighted,exam_score) VALUES (:student_id, :subject_id, :class_id, :exam_weighted :exam_score)", [
            'student_id' => $student_id,
            'subject_id' => $subject_id,
            'class_id' => $grade['id'],
            'exam_weighted' => $exam_weighted,
            'exam_score' => $exam_score
        ]);
        header('location: /facilitator/assessment');
        die();
    }

    die();
}



