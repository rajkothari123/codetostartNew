<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';


	protected $fillable = [
        'name', 'slug','user_id','body','photo_id','username','tagline','status'
    ];



    public function category(){
    	return $this->hasMany(Category::class);
    }

    public function user(){
    	return $this->belongsToMany(User::class);
    }



    public function comment(){
        return $this->hasMany(Comment::class);
    }



    public function photo(){
        return $this->belongsTo(Photo::class);
    }




}
