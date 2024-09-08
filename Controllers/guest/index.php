<?php

// $title = 'LMIS';

view('partials/head.php', [
    'title' => 'LMIS'
]);
view("partials/guest-nav.php");
view('guest/index.view.php');
view('partials/footer.php');
?>
 

