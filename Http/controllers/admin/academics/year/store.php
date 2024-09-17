<?php



// Academic year
$year = $_POST['year'];                     
$year_start_date = $_POST['year_start_date'];
$year_end_date = $_POST['year_end_date'];
$number_of_terms = $_POST['number_of_terms'];

use Core\Database;
$db = new Database();

// Insert into "academic year" table
$db->query("INSERT INTO academic_year(year, start_date, end_date, number_of_terms) VALUES(:year, :start_date, :end_date, :number_of_terms)",[
    'year' => $year,
    'start_date' => $year_start_date,
    'end_date' => $year_end_date,
    'number_of_terms' => $number_of_terms
]);

// Terms
for ($i = 0; $i < count($_POST['term_name']); $i++) {

    $term_name = $_POST['term_name'][$i];
    $term_start_date = $_POST['term_start_date'][$i];
    $term_end_date = $_POST['term_end_date'][$i];


// Insert into "Terms" table
    $db->query("INSERT INTO terms (year, term_name, start_date, end_date) VALUES (:year, :term_name, :start_date, :end_date)", [
        'year' => $year,
        'term_name' => $term_name,
        'start_date' => $term_start_date,
        'end_date' => $term_end_date
    ]);
}

$alert ="Academic year" .$year. "has been added";

header("Location: /admin/academics/year/create?alert=" . urlencode($alert));
?>