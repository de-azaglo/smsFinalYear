<?php

// if(isset($errors)){
// dd($errors);
// }

view('partials/head.php', [
    'title' => 'Login'
]);

view('partials/guest-nav.php');

if (isset($errors)) {
    view('guest/sessions/create.view.php', [
        'errors' => $errors
    ]);
} else {
    view('guest/sessions/create.view.php');
}

view('partials/footer.php');
?>