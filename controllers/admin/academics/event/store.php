<?php



// Data From Form
$year           = $_POST['year'];
$event_name     = $_POST['event_name'];
$start_date     = $_POST['start_date'];
$end_date       = $_POST['end_date'];
$event_type     = $_POST['event_type'];
$school_status = $_POST['school_status'];

use Core\Database;

$db = new Database();

// Insert into "events" table
$db->query("INSERT INTO events(year, event_name, start_date, end_date, event_type, school_status) VALUES(:year, :event_name, :start_date, :end_date, :event_type, :school_status)", [
    'year' => $year,
    'event_name' => $event_name,
    'start_date' => $start_date,
    'end_date' => $end_date,
    'event_type' => $event_type,
    'school_status' => $school_status,

]);


$alert =  $event_name . " has been added";

header("Location: /admin/academics/event/create?alert=" . urlencode($alert));
