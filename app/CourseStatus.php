<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStatus extends Model
{
    protected $table = 'course_status';


    protected $fillable = [
        'user_id', 'blog_id',
    ];


    public function user(){
        return $this->belongsToMany(User::class);
    }


    public function blog(){
        return $this->belongsToMany(Blog::class);
    }

}
