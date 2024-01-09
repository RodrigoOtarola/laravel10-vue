<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion con tabla category, n:n
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    //Relacion con levels. 1:n (inverso) porque contiene la llave foranea
    public function level(){
        return $this->belongsTo(Level::class);
    }
}
