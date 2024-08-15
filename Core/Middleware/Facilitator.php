<?php
namespace Core\Middleware;

class Facilitator
{
    public function handle()
    {
        $user = $_SESSION['user'];

        if ($user['user_type'] != 'facilitator') {
        if ($_SESSION['user'] ?? false) {
            $databaseUserTypes = require base_path('database/user_types.php');

                foreach ($databaseUserTypes as $user_type) {
                    if ($_SESSION['user']['user_type'] === $user_type['user_type']) {
                        header("location: {$user_type['location']}");
                        exit();
                    }

                }
            }
            header("location: /");
            exit(); 
        }

        
    }
}
?>