<?php
$title = 'Timetable';

use Core\Database;

$db = new Database();




if (isset($_GET['grade'])) {
    $class_id = $_GET['grade'];
} else {
    $class_id = 1;
}



$grade = $db->query("SELECT * FROM grades WHERE id = :id", [
    'id' => $class_id
])->find();

// dd($grade['id']);

$grades = $db->query("SELECT * FROM grades")->findAll();


$subjects = $db->query("SELECT * FROM subjects")->findAll();
$times = $db->query("SELECT * FROM time_periods")->findAll();
$days = $db->query("SELECT * FROM school_days")->findAll();
// $lessons = $db->query("SELECT * FROM lesson_periods WHERE grade = :grade", [
//     'grade' => $class_id
// ])->findAll();

// dd($lessons);

function getSubject($time_id, $day, $grade)
{
    $db = new Database();

    $lesson = $db->query("SELECT * FROM lesson_periods WHERE time_slot = :time_slot AND day = :day AND grade = :grade", [
        'time_slot' => $time_id,
        'day' => $day,
        'grade' => $grade
    ])->find();

    // dd($lesson);
    if($lesson){

    return $db->query("SELECT * FROM subjects WHERE id= :subject_id", [
        'subject_id' => $lesson['subject']
    ])->find();
    }else{
        return NULL;
    }
}





// dd($events);







view('partials/admin/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('admin/academics/timetable/show.view.php', [
    'times' => $times,
    'days' => $days,
    'subjects' => $subjects,
    'grade' => $grade,
    'grades' => $grades,
]);


