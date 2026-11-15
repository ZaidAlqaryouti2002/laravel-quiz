<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lecturers extends Model
{
      public function user(){
        return $this->belongsTo(User::class);
    }

    public function courses_courseuser(){
        return $this->hasMany(courses::class);
    }
}
