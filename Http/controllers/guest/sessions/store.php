<?php

use Core\Authenticator;
use Http\Forms\LoginForm;



$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;



if(!$form->validate($email)){
    return view('guest/sessions/create.view.php', [
        'errors' => $form->errors()
    ]);
}

$auth = new Authenticator();


if (! $auth->attempt($_POST['email'], $_POST['password'])){
    $errors['auth'] = 'Email and Password does not match';

    return view('guest/sessions/create.view.php', [
        'errors' => $errors
    ]);
}

// If the email address is in the correct format, check if it's exist in the database
// if (empty($errors)) {

//     $user = $db->query('SELECT * FROM users WHERE email = :email OR user_number = :user_number', [
//         'email' => $_POST['email'],
//         'user_number' => $_POST['email']
//     ])->find();
//     if ($user) {
//         if ($password === $user['password']) {
//             login($user);

//             checkuser($user['user_type']);
//             die();


//         }
//     }
//     $errors['auth'] = 'Email and Password does not match';

// }

// terminateWithError($errors, 'controllers/guest/sessions/create.php');
// if (!($password === $user['password'])) {
//     $errors['password'] = 'Email and Password does not match';
// }

// terminateWithError($errors, 'controllers/sessions/create.php');


// Check if the account matches the user's password in the database










// else{
//     login([
//         'id' => '$id',
//         'email' => $email
//     ]);
// }

// echo "Submitted the form";
// die();
