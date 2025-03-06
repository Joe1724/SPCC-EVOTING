<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'course', 'student_id', 'position_id', 'partylist_id', 'election_id', 'image', 'description', 'motto'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
