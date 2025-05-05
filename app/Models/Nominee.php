<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'course', 'position', 'partylist', 'image', 'description'];

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
