<?php

namespace App\Http\Controllers;

use App\Course;
use DB;
use App\CourseUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::latest()->get();

        return view('courses.index',compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        $course = Course::whereSlug($slug)->first();
        $course_categories=$course->category()->orderBy('preference','asc')->get();

        $blogs=DB::table('course_status')
            ->join('blogs', function ($join) {
                $join->on('course_status.blog_id', '=', 'blogs.id');
            })
            ->where('course_status.user_id', '=', Auth::user()->id)
            ->select("course_status.*")
            ->get();









        $related_courses = DB::table('courses')
                     ->select(DB::raw('name'))
                     ->where('id', '<>',$course['id'] )                     
                     ->get();
        
        $is_enrolled = false;

        // if user is logged in
        if(Auth::check()){
            $course_user=CourseUser::where('user_id', Auth::user()->id)
                                    ->where('course_id', $course['id'])->first();
            if($course_user){
                $is_enrolled = true;
            }
        }

        return view('courses.show',compact('course','course_categories', 'is_enrolled','related_courses','blogs'));
    }


    public function enroll(Request $request)
    {
           
        $input=$request->all();       

        $course_user=CourseUser::create(['user_id'=>Auth::user()->id,'course_id'=>$request->course_id]);

        return Redirect::action('UserController@show',Auth::user()->username);


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
