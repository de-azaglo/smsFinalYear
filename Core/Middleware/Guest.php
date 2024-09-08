<?php
namespace Core\Middleware;

class Guest
{
    
    public function handle()
    {
        $databaseUserTypes = require base_path('database/user_types.php');
        if ($_SESSION['user'] ?? false){
            foreach ($databaseUserTypes as $user_type) {
                if ($_SESSION['user']['user_type'] === $user_type['user_type']) {
                    header("location: {$user_type['location']}");
                    exit();
                }
            }
        }
    }
}
?>