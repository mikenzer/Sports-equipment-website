<?php

namespace App;

use App\Models\User;
use App\Models\Product;

class SessionGuard
{
    protected static $user;
    protected static $product;

    public static function login(User $user, array $credentials)
    {
        $verified = password_verify($credentials['user_password'], $user->user_password);
        if ($verified) {
            $_SESSION['user_id'] = $user->user_id;
        }
        return $verified;
    }

    public static function user()
    {
        if (! static::$user && static::isUserLoggedIn()) {
            static::$user = User::find($_SESSION['user_id']);
        }
        return static::$user;
    }
    // public static function product()
    // {
        
    //     static::$product = Product::orderBy('pro_id', 'DESC')->get();
        
    //     return static::$product;
    // }

    public static function logout()
    {
        static::$user = null;
        session_unset();
        session_destroy();
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['user_id']);    
    }
}
