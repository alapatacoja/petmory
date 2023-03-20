<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    //usuario al que pertenece
    public function user(){
        return $this->belongsTo(User::class);
    }

    //posts asociados a la mascota
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
