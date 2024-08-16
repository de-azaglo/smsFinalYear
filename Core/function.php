<?php

use Core\Database;
use JetBrains\PhpStorm\NoReturn;


function urlIs($value):bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function base_path($path, $attributes = []):string
{
    extract($attributes);
    return BASE_PATH . $path;
}

function view($path, $attributes = []): void
{
    extract($attributes);
    // dd($attributes);
    require base_path('views/' . $path);
}

#[NoReturn] function dd($obj)
{
    var_dump($obj);
    die();
}

function login($user):array
{
    $_SESSION['user'] = [
        'id' => $user['user_id'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'user_type' => $user['user_type'],
        'user_number' => $user['user_number'],
    ];

    session_regenerate_id(true);
    return $_SESSION['user'];
}

function checkuser($FormUserType): void
{
    $DatabaseUserTypes = require base_path('database/user_types.php');


    foreach ($DatabaseUserTypes as $user_type) {
        if ($FormUserType === $user_type['user_type']) {
            header("location: {$user_type['location']}");
            exit();
        }
    }
}

function terminateWithError($errors, $path): void
{
    if (!empty($errors)) {
        require base_path($path, [
            'errors' => $errors
        ]);
        die();
    }
}

function logout(): void
{

    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('HTTPSESSION', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function generateUserId($role, $db_table): string
{
    // Define role prefixes
    $rolePrefixes = [
        'teacher' => 'TEA',
        'parent' => 'PAR',
        'student' => 'STU',
        // Add more roles as needed
    ];

    // Check if the role is valid
    if (!array_key_exists($role, $rolePrefixes)) {
        // Handle invalid role (you can throw an exception or return an error)
        return "Invalid Role";
    }

    // Get the prefix for the specified role
    $prefix = $rolePrefixes[$role];

    // Generate a unique random three-digit number


    $db = new Database();

    $lastUserId = $db->query("SELECT id FROM {$db_table} ORDER BY id DESC LIMIT 1")->fetchColumn();
    $newNumericPart = $lastUserId + 1;

    // Concatenate the prefix and the random number
    return $prefix . sprintf('%03d', $newNumericPart);
}

function checkStatus($date, $student_id, $class_id)
{

    $db = new Database();

    $present_student = $db->query('SELECT * FROM attendance WHERE date = :today AND student_id = :student_id AND class_id = :class_id',[
        'today' => $date,
        'class_id' => $class_id,
        'student_id' => $student_id
    ])->find();


    if ($present_student){
        return $present_student['status'];
    }

    return "Not Marked";

}


