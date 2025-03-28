<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Voter extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'student_id', 'password', 'role'
    ];

    protected $hidden = [
        'password',
    ];
}
