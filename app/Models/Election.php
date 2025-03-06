<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'start', 'end'];

    public function nominees()
    {
        return $this->hasMany(Nominee::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function partylists()
    {
        return $this->hasMany(Partylist::class);
    }
}
