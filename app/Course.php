<?php

namespace App;

use DB;
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


    public function time($id){
         $a=DB::table('blogs')
            ->join("blog_category as bc", "bc.blog_id", "=", "blogs.id")
            ->join("categories as c", "c.id", "=", "bc.category_id")
            ->where("c.course_id", "=", $id)
            ->select(DB::raw("SUM(time) as times"))
            ->get('id');

        foreach ($a as $item){
            return $item->times;
        }


    }




}
