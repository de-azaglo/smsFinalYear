<?php
namespace Core;

use Core\Database;


class Authenticator{
    public function attempt($email, $password){
        $db = new Database();
        $user = $db->query('SELECT * FROM users WHERE email = :email OR user_number = :user_number', [
            'email' => $email,
            'user_number' => $email
        ])->find();

        if ($user) {
            if ($password === $user['password']) {
                $this->login($user);

                $this->checkuser($user['user_type']);
                die();
            }
        }
    }

    public function login($user): array
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
    public function checkuser($FormUserType): void
    {
        $DatabaseUserTypes = require base_path('database/user_types.php');


        foreach ($DatabaseUserTypes as $user_type) {
            if ($FormUserType === $user_type['user_type']) {
                header("location: {$user_type['location']}");
                exit();
            }
        }
    }
}


