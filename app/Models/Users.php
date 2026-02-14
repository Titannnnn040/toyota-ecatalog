<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'm_user';
    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
}
