<?php

view('partials/head.php', [
    'title' => 'Contact'
]);
view("partials/guest-nav.php");
view('guest/contact.view.php');
view('partials/footer.php');

?>