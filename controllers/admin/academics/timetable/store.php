<?php

use Core\Database;

$db = new Database();







for ($i = 0; $i < count($_POST['time_slot']); $i++) {
    $time_slot =   $_POST['time_slot'][$i];
    $day =         $_POST['day'][$i];
    $subject =     $_POST['subject'][$i];
    $grade =     $_GET['grade'];


    $db->query("INSERT INTO lesson_periods (time_slot, day, subject, grade) VALUES(:time_slot, :day, :subject, :grade)", [
        'time_slot' => $time_slot,
        'day' => $day,
        'subject' => $subject,
        'grade' => $grade
    ]);
}






$alert =  "Timetable for Grade " . $_GET['grade'] . " created";

header("Location: /admin/academics/timetable/create?alert=" . urlencode($alert));

// day
// time
// subject