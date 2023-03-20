<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //usuario que publica
    public function user(){
        return $this->belongsTo(User::class);
    }

    //mascota asociada al post
    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
