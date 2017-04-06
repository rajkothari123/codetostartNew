<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'course_comments';


    protected $fillable = [
        'body', 'user_id','course_id','email','name'
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }


}
