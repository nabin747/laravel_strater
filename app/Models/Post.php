<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Post extends Model
{
    use HasFactory;


    // public function posts(){
    //     return $this->hasMany(Post::class);
    // }

    public function student(){
        return $this->belongsTo(Student::class, 'id');
    }
}
