<?php

view('partials/head.php', [
    'title' => 'About Us'
]);
view("partials/guest-nav.php");
view('guest/about.view.php');
view('partials/footer.php');

?>