<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model {
    use HasFactory;

    protected $fillable = ['nominee_id', 'election_id', 'count'];

    public function nominee() {
        return $this->belongsTo(Nominee::class);
    }

    public function election() {
        return $this->belongsTo(Election::class);
    }
}
