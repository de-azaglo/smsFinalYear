<?php
$title = 'Assessment';

use Core\Database;

$db = new Database();

$user_number = $_SESSION['user']['user_number'];




$student = $db->query('SELECT * FROM students WHERE parent_id = :user_number', [
    'user_number' => $user_number
])->find();
// dd($student);

$grade = $db->query("SELECT * FROM grades WHERE id = :id",[
    'id' => $student['class_id']
])->find();

$jhs_subjects = $db->query('SELECT * FROM subjects WHERE examinable = "true" AND id NOT IN (7, 9)')->findAll();

$primary_subjects = $db->query('SELECT * FROM subjects WHERE examinable = "true" AND id NOT IN (23)')->findAll();


if($grade['id'] <= 7 ){
    $subjects = $primary_subjects;

} else {
    $subjects = $primary_subjects;
}

$assessments = $db->query('SELECT s.user_number, s.first_name, s.other_name, s.last_name, subj.subject_title, a.class_score, a.exam_weighted, a.final_score, a.subject_id
FROM assessment a
JOIN students s ON a.student_id = s.user_number
JOIN subjects subj ON a.subject_id = subj.id
WHERE a.student_id = :user_number',[
    'user_number' => $student['user_number']
])->findAll();

$class_scores = $db->query('SELECT * FROM assessment WHERE class_id = :class_id', [
    'class_id' => $student['class_id']
])->findAll();



function getScore($student_id, $subject_id, $score_type){
    $db = new Database();

   return $db->query('SELECT ' .$score_type. ' FROM assessment WHERE student_id = :student_id AND subject_id = :subject_id',[
        'student_id' => $student_id,
        'subject_id' => $subject_id
    ])->find();
}

$scores = [];
foreach ($class_scores as $class_score) {
    $student_id = $class_score['student_id'];
    $subject_id = $class_score['subject_id']; // Assuming 'subject_title' is unique, use subject ID if it's available
    $total_score = $class_score['class_score'] + $class_score['exam_weighted'];

    if (!isset($scores[$student_id])) {
        $scores[$student_id] = ['total' => 0, 'subjects' => []];
    }
    $scores[$student_id]['subjects'][$subject_id] = $total_score;
    $scores[$student_id]['total'] += $total_score; // Sum up total scores for each student

}


function getGrade($score){
    switch ($score) {
        case ($score >= 80) :
            return "Advance";
            break;
        case ($score >= 75 && $score <= 79  ):
            return "Proficient";
            break;
        case ($score >= 70 && $score <= 75):
            return "Approaching Proficiency";
            break;
        case ($score >= 65 && $score <= 69):
            return "Developing";
            break;
        case ($score <= 64):
            return "Beginning";
            break;
    }
}




/**
 * Function to calculate the position of a student in a specific subject.
 *
 * @param string $subject_id The subject ID to calculate the rank for.
 * @param string $student_id The student ID whose position we need to find.
 * @param array $scores The associative array of all student scores.
 *
 * @return int The position of the student in the specified subject.
 */
function getStudentPositionInSubject($subject_id, $student_id, $scores)
{

    // echo '<pre>';
    // print_r($scores);
    // echo '</pre>';

    $subject_scores = [];

    // Extract scores for the specified subject
    foreach ($scores as $id => $data) {
        if (isset($data['subjects'][$subject_id])) {
            $subject_scores[$id] = $data['subjects'][$subject_id];
        }
    }


    if (empty($subject_scores)) {
        return null;
    }
    // Sort the extracted scores in descending order
    arsort($subject_scores);


    $rank = 1;
    $previous_score = -1;
    $position_counter = 1;

    // Calculate position for the specified student
    foreach ($subject_scores as $id => $score) {
        if ($score != $previous_score) {
            $rank = $position_counter;
        }

        

        // If the current student matches the specified student, return rank
        if ($id == $student_id) {
            return $rank;
            
        }


        $previous_score = $score;
        $position_counter++;
    }

    return null; // Return null if the student or subject is not found
}
function getOverallPosition($student_id, $scores)
{
    $total_scores = [];

    // Step 1: Calculate total scores for each student
    foreach ($scores as $id => $data) {
        $total_scores[$id] = $data['total']; // 'total' is already the sum of all subjects for each student
    }

    // Step 2: Sort the total scores in descending order
    arsort($total_scores);

    $rank = 1;
    $previous_score = -1;
    $position_counter = 1;

    // Step 3: Loop through total scores to find the overall rank of the specific student
    foreach ($total_scores as $id => $score) {
        // Update rank if the current score is different from the previous one
        if ($score != $previous_score) {
            $rank = $position_counter;
        }

        // Check if the current student is the one we're looking for
        if ($id == $student_id) {
            return $rank; // Return the overall rank of the specific student
        }

        // Update the previous score and increment the counter
        $previous_score = $score;
        $position_counter++;
    }

    // If the student is not found in the loop, return null
    return null;
}
// dd($assessment);



$year = $db->query("SELECT * FROM academic_year WHERE status = :status",[
    'status' => "active"
])->find();
$terms = $db->query("SELECT * FROM terms WHERE status = :status",[
    'status' => "active"
])->find();

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

view('parent/assessment/show.view.php', [
    'student' => $student,
    'subjects' => $subjects,
    'grade' => $grade,
    'year' => $year,
    'terms' => $terms,
    'assessments' => $assessments,
    'scores' => $scores
    // 'events' => $events
]);
