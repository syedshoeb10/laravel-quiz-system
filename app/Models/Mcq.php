<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
         protected $table = "mcqs";

         public function Quiz(){
            return $this->belongsTo(Quiz::class);
         }

}

