<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
    //
    protected $table = 'auth_models';
    protected $fillable = ['username', 'password', 'role'];
}
