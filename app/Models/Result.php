<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['nominee_id', 'position', 'count'];

    public function nominee()
    {
        return $this->belongsTo(Nominee::class);
    }
}

