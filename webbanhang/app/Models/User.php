<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_name', 'user_phone', 'user_address', 'user_email', 'user_password'];

    public static function validate(array $data) {
        $errors = [];

        if (! $data['user_email']) {
            $errors['user_email'] = 'E-mail không đúng.';
        } elseif (static::where('user_email', $data['user_email'])->count() > 0) {
            $errors['user_email'] = 'E-mail đã được sử dụng.';
        }    

        if (strlen($data['user_password']) < 6) {
            $errors['user_password'] = 'Mật khẩu tối thiểu 6 ký tự.';
        } elseif ($data['user_password'] != $data['user_password_confirmation']) {
            $errors['user_password'] = 'Mật khẩu không trùng khớp.';
        }
        
        return $errors;
    }   
    
}
