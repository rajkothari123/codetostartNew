<?php

namespace App\Http\Controllers;

use App\Course;
use App\Photo;
use DB;
use App\Blog;
use App\CourseUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
        $this->middleware('admin', ['only' => 'create']);
    }
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::latest()->paginate(5);





        $course_times = DB::table('blogs')
            ->join("blog_category as bc", "bc.blog_id", "=", "blogs.id")
            ->join("categories as c", "c.id", "=", "bc.category_id")
            ->join("courses as cu", "cu.id", "=", "c.course_id")
            ->select(DB::raw("SUM(time) as times"))
            ->groupBy('cu.id')
            ->get();




        return view('courses.index',compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input=$request->all();
        $input['slug']=str_slug($request->name);
        $input['name']=$request->name;
        $input['tagline']=$request->tagline;
        $input['body']=$request->body;
        $input['user_id']=Auth::user()->id;
        $input['username']=Auth::user()->name;

        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['photo'=>$name,'name'=>$name]);
            $input['photo_id']=$photo->id;
        }

        $course=Course::create($input);

        $courses=Course::where('status',0)->latest()->get();
        return view('courses.draft',compact('courses'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //Find current course id
        $course = Course::whereSlug($slug)->first();

        //Find all the modules(category) of current course using Relation
        $course_categories=$course->category()->orderBy('preference','asc')->get();



        //Get all the blogs read by the current user
        if(Auth::check()){
            $blogs=DB::table('course_status')
                ->join('blogs', function ($join) {
                    $join->on('course_status.blog_id', '=', 'blogs.id');
                })
                ->where('course_status.user_id', '=', Auth::user()->id)
                ->select("course_status.*")
                ->get();
        }


        //Get progress of the current course of current user
        if(Auth::check()){
            $course_done = DB::table('course_status')
                ->join("blog_category as bc", "bc.blog_id", "=", "course_status.blog_id")
                ->join("categories as c", "c.id", "=", "bc.category_id")
                ->where("course_status.user_id", "=", Auth::user()->id)
                ->where("c.course_id", "=", $course['id'])
                ->get();
            $course_done=count($course_done);
        }


        $course_times = DB::table('blogs')
            ->join("blog_category as bc", "bc.blog_id", "=", "blogs.id")
            ->join("categories as c", "c.id", "=", "bc.category_id")
            ->where("c.course_id", "=", $course['id'])
            ->select(DB::raw("SUM(time) as times"))
            ->get();


        //Get count of total number of blogs (syllabus) of current course
        $course_syllabus = Blog::select("blogs.*")
            ->join("blog_category as bc", "bc.blog_id", "=", "blogs.id")
            ->join("categories as c", "c.id", "=", "bc.category_id")
            ->where("c.course_id", "=", $course['id'])
            ->get();

        $course_syllabus_count=count($course_syllabus);



        //Check for percentage of progress done and round
        if(Auth::check()){
            if($course_done!=0)
                $total=round(($course_done/$course_syllabus_count) * 100);
            else
                $total=0;
        }



        //Get all the related course except the current course
        $related_courses=DB::table('courses')
            ->join('photos', function ($join) {
                $join->on('courses.photo_id', '=', 'photos.id');
            })
            ->where('courses.id', '<>',$course['id'] )
            ->select('courses.name','photos.photo')
            ->get('name','photo');




        //Check if the current user is enrolled in the course
        $is_enrolled = false;
        if(Auth::check()){
            $course_user=CourseUser::where('user_id', Auth::user()->id)
                ->where('course_id', $course['id'])->first();
            if($course_user){
                $is_enrolled = true;
            }
        }

        return view('courses.show',compact('course','course_categories', 'is_enrolled','related_courses','blogs','total','course_times'));
    }


    public function enroll(Request $request)
    {

        $input=$request->all();

        $course_user=CourseUser::create(['user_id'=>Auth::user()->id,'course_id'=>$request->course_id]);

        return Redirect::action('UserController@show',Auth::user()->username);


    }


    public function draft(){
        $courses=Course::where('status',0)->latest()->get();
        return view('courses.draft',compact('courses'));
    }


    public function publish(Request $request,$id){

        $input=$request->all();
        $course=Course::findorFail($id);
        $input['status']=1;
        $course->update($input);
        return redirect()->back();

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
