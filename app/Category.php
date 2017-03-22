<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
        'name', 'slug','course_id','preference'
    ];
    
    public function blog(){
    	return $this->belongsToMany(Blog::class);
    }

    public function subcategory(){
    	return $this->hasMany(Subcategory::class);
    }

    public function course(){
    	return $this->belongsTo(Course::class);
    }

}
