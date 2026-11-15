<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
   public function lecturers(){
        return $this->belongsTo(course_user::class);
    }

     public function lectures(){
        return $this->hasMany(lectures::class);
    }

   public function courses_courseuser(){
        return $this->hasMany(courses::class);
    }
}
