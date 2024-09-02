<?php
namespace Core\Middleware;


class Middleware{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
        'admin' => Admin::class,
        'facilitator' => Facilitator::class,
        'student' => Student::class
    ];

    public static function resolve($key){
        if (!$key){
            return;
        }
        $middleware = static::MAP[$key];
        (new $middleware)->handle();
    }
}

?>