<?php
$title = 'Terms';

use Core\Database;

$db = new Database();

if(isset($_GET['setActiveTerm'])){
    $db->query("UPDATE terms SET status = NULL WHERE status = 'active'");
    $db->query("UPDATE terms SET status = 'active' WHERE id = :id", [
        'id' => $_GET['setActiveTerm']
    ]);
}



$terms = $db->query("SELECT * FROM terms")->findAll();

//  function setActive(String $term_id): void
// {
//     $db = new Database();
//     $db->query("UPDATE terms SET status = NULL WHERE status = 'active'");
//     $db->query("UPDATE terms SET status = 'active' WHERE id = :id",[
//         'id' => $term_id
//     ]);

//     header("Location: " . $_SERVER['PHP_SELF']);
//     die();
// }





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

view('admin/academics/terms/show.view.php', [
    'terms' => $terms,
]);


