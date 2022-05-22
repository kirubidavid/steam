<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class UsUser extends Model
{
    protected $table = 'us_users';

    protected $fillable = [
        'uuid',
        'us_first_name',
        'us_last_name',
        'us_phone_number',
        'us_password'
    ];

    public function createUser($data)
    {
        return self::create($data);
    }

}