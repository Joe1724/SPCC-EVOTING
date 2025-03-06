<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Voter extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $fillable = ['name', 'student_id', 'course', 'election_id'];
}
