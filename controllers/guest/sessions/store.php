<?php

use Core\Validator;
use Core\App;
use Core\Database;

// $container = new Container;
// $db = $container->resolve('Core\Database');

// dd($db);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// Check if the email address is in the correct format
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}
terminateWithError($errors, 'controllers/guest/sessions/create.php');
// $db = App::resolve(Database::class);
$db = new Database;

// If the email address is in the correct format, check if it's exist in the database
if (empty($errors)) {
    $user = $db->query('SELECT * FROM users WHERE email = :email OR user_number = :user_number', [
        'email' => $_POST['email'],
        'user_number' => $_POST['email']
    ])->find();
    if ($user) {
        if ($password === $user['password']) {
            login($user);

            checkuser($user['user_type']);
            die();

            // if($user['user_type'] === );

            // if ($user['user_type'] === 'admin'){
            //     header('location: /admin/dashboard');
            // }
            // if ($user['user_type'] === 'admin'){
            //     header('location: /admin/dashboard');
            // }
            // if ($user['user_type'] === 'admin'){
            //     header('location: /admin/dashboard');
            // }
        }
    }
    $errors['auth'] = 'Email and Password does not match';
    // if (!$user) {
    //     $errors['email'] = 'Account not found, Enter a valid email address';
    // }
}

terminateWithError($errors, 'controllers/guest/sessions/create.php');
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
