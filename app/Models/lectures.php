<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lectures extends Model
{
     public function courses(){
        return $this->belongsTo(courses::class);
    }
}
