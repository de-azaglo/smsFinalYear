<?php
$title = 'Academic Calendar';

use Core\Database;

$db = new Database();



$academic_calender = $db->query("SELECT y.year, e.event_name, e.start_date, e.end_date, e.event_type, e.school_status FROM events e JOIN academic_year y ON y.year = y.year")->findAll();

// dd($academic_calender);

// $year = $db->query("SELECT * FROM academic_year WHERE status = :status",[
//     'status' => "active"
// ])->find();

// $events = $db->query("SELECT * FROM events WHERE year = :year ORDER BY start_date", [
//     'year' => $year['year']
// ])->findAll();

// dd($events);







view('partials/student/head.php', [
    'title' => $title,
]);

view('partials/user/side-nav.php', [
    'name' => $_SESSION['user']['last_name'],
    'user_type' => $_SESSION['user']['user_type']
]);

view('partials/user/nav.php', [
    'name' => $_SESSION['user']['last_name']
]);

view('student/calendar/show.view.php', [
    // 'year' => $year,
    'academic_calender' => $academic_calender
    // 'events' => $events
]);
