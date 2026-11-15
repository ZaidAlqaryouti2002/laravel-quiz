<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course_user extends Model
{
    public function users_courseuser_table()
    {
        return $this->belongsTo(User::class);
    }

    public function courses_courseuser_table()
    {
        return $this->belongsTo(courses::class);
    }
}
