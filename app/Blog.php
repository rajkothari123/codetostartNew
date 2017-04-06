<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
    protected $fillable=['title','body','photo_id','slug','meta_title','meta_desc','status','user_id'];





    public function category(){
    	return $this->belongsToMany(Category::class);
    }



    public function photo(){
    	return $this->belongsTo(Photo::class);
    }


    public function user(){
    return $this->belongsTo(User::class);	
    }


    public function course_status(){
        return $this->belongsTo(CourseStatus::class);
    }

    public function check_read_status($id){
        $blogs=DB::table('course_status')
            ->where('course_status.user_id', '=', Auth::user()->id)
            ->where('course_status.blog_id', '=', $id)
            ->select("course_status.*")
            ->get()->first();

        if(!$blogs){
            return "FALSE";
        }
    }


}
