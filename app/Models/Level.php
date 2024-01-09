<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded=[];

    //Relación con Lesson, 1:n; hasMany por que no contiene la llave foranea.
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
