<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = "quizess";
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function Mcq(){
        return $this->hasMany(Mcq::class);
    }
}
