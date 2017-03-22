<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','username','about','website','facebook','twitter','github','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function role(){
        return $this->belongsTo(Role::class);
    }


    public function blog(){
        return $this->hasMany(Blog::class);
    }


    public function photo(){
        return $this->belongsTo(Photo::class);
    }


    public function course(){
        return $this->belongsToMany(Course::class);
    }

    public function course_status(){
        return $this->belongsTo(CourseStatus::class);
    }

}


