<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
     protected $table = "categories";

     public function quizzes()
     {
          return $this->hasMany(Quiz::class);
     }
}
