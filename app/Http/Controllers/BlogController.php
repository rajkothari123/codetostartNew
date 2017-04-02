<?php

namespace App\Http\Controllers;

use App\Favourites;
use Illuminate\Http\Request;

use App\Blog;

use App\Course;

use App\CourseStatus;

use App\Category;

use App\Subcategory;

use App\Photo;

use Session;

use Cookie;

use DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\User;

class BlogController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function index(Request $request){        
        $blog_count=Blog::where('status',1)->count();
        $blogs = Blog::where(function($query) use ($request) {
            if (($term = $request->get('term'))) {
                $query->orWhere('title', 'like', '%' . $term . '%');
            }
        })
        ->orderBy("id", "desc")
        ->whereStatus(1)
        ->paginate(10);

        $category=Category::pluck('name','id');     

        $blog_views = DB::table('blogs')->sum('views');
        return view('blog.index',compact('blogs','blog_count','category','blog_views'));
    	
    }




    public function publish(Request $request,$id){

        $input=$request->all();
        $blog=Blog::findorFail($id);
        $input['status']=1;
        $blog->update($input);
        return redirect('blog');
        
    }


    public function draft(){        
        $blogs=Blog::where('status',0)->latest()->get();
        return view('blog.draft',compact('blogs'));
    }


    public function create(){        
        //$category = Category::select(DB::raw("CONCAT(name,'-',course_id) AS name"),'id')->pluck('name', 'id');
        $category = DB::table('categories')
            ->join('courses', 'categories.course_id', '=', 'courses.id')            
            ->select(DB::raw("CONCAT(categories.name,'-',courses.name) AS name"),'categories.id')
            ->pluck('name','id');
            

        
    	return view('blog.create',compact('category'));
    }


    public function store(Request $request){
        $rules=[
        'title' => ['required','min:10','max:40'],
     

        'body' => ['required'],
        'photo_id' =>['mimes:jpeg,jpg,png'],
        
        ];

        $message=[

        'photo_id.mimes' =>'Your Image Must Be In jpeg,jpg or png',
        'title.required' => 'Please Enter Title',
        'title.min' => 'Title is a bit short bro',

        ];

        $this->validate($request,$rules,$message);


    	$input=$request->all();
    	$input['slug']=str_slug($request->title);
    	$input['meta_title']=$request->title;
        $input['user_id']=Auth::user()->id;

    	if($file=$request->file('photo_id')){
    	$name=$file->getClientOriginalName();
    	$file->move('images',$name);
    	$photo=Photo::create(['photo'=>$name,'name'=>$name]);
    	$input['photo_id']=$photo->id;

    	}


    	$blog=Blog::create($input);
    	if($categoryIds=$request->category_id){
    		$blog->category()->sync($categoryIds);
    	}

/*
        $users=User::all();
        foreach ($users as $user) {

            Mail::send('emails.newblog',['blog'=>$blog,'user'=>$user],function($message) use ($user){
            $message->to($user->email)->from('raj.kothari90@gmail.com','Raj Kothari')->subject('A New Blog Has been posted');    
            });
            
        }*/
        /*Session::flash('flash_message','You have just created a blog !!');*/



        notify()->flash('New Blog Created','success',['timer'=>2000]);

    	return redirect('blog');
    }



    public function show($slug){

        //Grab the Auth Id
        $user_id = Auth::user()->id;
    	// $blog = Blog::select("blogs.*")
     //                ->join("blog_category as bc", "bc.blog_id", "=", "blogs.id")
     //                ->join("categories as c", "c.id", "=", "bc.category_id")
     //                ->join("course_user as cu", function($q) use($user_id){
     //                    $q->on("cu.course_id", "=", "c.course_id")
     //                    ->where("cu.user_id", "=", $user_id);
     //                })
     //                ->where("blogs.slug", $slug)
     //                ->first();

        //Check whether the user have enrolled for that course
        $blog = Blog::select("blogs.*")
                    ->join("blog_category as bc", "bc.blog_id", "=", "blogs.id")
                    ->join("categories as c", "c.id", "=", "bc.category_id")
                    ->join("course_user as cu", "cu.course_id", "=", "c.course_id")
                    ->where("cu.user_id", "=", $user_id)
                    ->where("blogs.slug", $slug)
                    ->first();

        if(!$blog){
            return redirect()->back();

        }

        //Pass the blog views
        $blog->views=$blog->views + 1;

        DB::table('blogs')
        ->where('slug', $slug)
        ->update(['views' => $blog->views]);


        //Blog Favourites and Blog Read Essential Variables
        $is_status=false;
        $is_favourite=false;
        $blog_id=Blog::whereSlug($slug)->first();

        //Find category id in order to get all the blogs for that category
        $category_id=DB::table('blog_category')->where('blog_category.blog_id','=',$blog_id->id)
            ->select("blog_category.category_id")
            ->pluck('category_id');


        //Related blogs
        $related_blogs=DB::table('blogs')
            ->join("blog_category as bc", "bc.blog_id", "=", "blogs.id")
            ->where("bc.category_id", "=", $category_id)
            ->get();



        //Name of the course
        $blog_course = DB::table('blog_category')->where('blog_category.blog_id','=',$blog_id->id)
            ->join("categories as c", "c.id", "=", "blog_category.category_id")
            ->join("courses as cu","cu.id","=","c.course_id")
            ->select("cu.name")
            ->get('name');




        //Check if Auth user have done the blog favourites or not
        $blog_favourite = DB::table('favourites_blog')
            ->select(DB::raw('user_id','blog_id'))
            ->where('user_id', '=',Auth::user()->id )
            ->where('blog_id','=',$blog_id->id)
            ->first();
        if($blog_favourite)
        {
            $is_favourite=true;
        }
        else{
            $is_favourite=false;
        }

        //Pass the course name
        $course_name = DB::table('blog_category')->where('blog_category.blog_id','=',$blog_id->id)
            ->join("categories as c", "c.id", "=", "blog_category.category_id")
            ->join("courses as cu","cu.id","=","c.course_id")
            ->select("cu.name")
            ->get('name');

        //Check whether the user have read the blog or not
        $course_status = DB::table('course_status')
            ->select(DB::raw('user_id','blog_id'))
            ->where('user_id', '=',Auth::user()->id )
            ->where('blog_id','=',$blog_id->id)
            ->first();

        if($course_status)
        {
            $is_status=true;
            return view('blog.show',compact('blog','course_status','is_status','is_favourite','course_name','related_blogs'));
        }else{

            $course_status_to=CourseStatus::create(['user_id'=>Auth::user()->id,'blog_id'=>$blog_id->id]);
            return view('blog.show',compact('blog','course_status','is_status','is_favourite','course_name','related_blogs'));
        }

    }


    public function favourites(Request $request)
    {
        $input=$request->all();
        $blog_favourite=Favourites::create(['user_id'=>Auth::user()->id,'blog_id'=>$request->blog_id]);
        return redirect()->back();
    }


    public function edit($id){
    	$category=Category::pluck('name','id');    	
    	$blog = Blog::findorFail($id);
    	return view('blog.edit',compact('blog','category'));
    }




    public function update(Request $request,$id){
    	
    	$input=$request->all();
    	$blog=Blog::findorFail($id);


    	if($file=$request->file('photo_id')){

    	if($blog->photo){
    		unlink('images/' .$blog->photo->photo);
    		$blog->photo->delete('photo');
    	}	


    	$name=$file->getClientOriginalName();
    	$file->move('images',$name);
    	$photo=Photo::create(['photo'=>$name,'name'=>$name]);
    	$input['photo_id']=$photo->id;
    }

    	$blog->update($input);
    	if($categoryIds=$request->category_id){
    		$blog->category()->sync($categoryIds);
    	}

        notify()->flash('Blog Updated','success',['timer'=>2000]);
    	return redirect('blog');
    }


    public function destroy(Request $request,$id){
    	
    	$blog=Blog::findorFail($id);

    	//For removing rows from the database table blog_category
    	$categoryIds=$request->category_id;
    	$blog->category()->detach($categoryIds);

    	
    	$blog->delete($request->all());
    	return redirect('/blog/bin');
    }

    public function bin(){

    	$deletedBlogs=Blog::onlyTrashed()->get();
    	return view('blog.bin',compact('deletedBlogs'));
    }


    public function restore($id){

    	$restoredBlogs=Blog::onlyTrashed()->findorFail($id);
    	$restoredBlogs->restore($restoredBlogs);
    	return redirect('/blog');
    }

    public function destroyBlog($id){
    	$destroyBlog=Blog::onlyTrashed()->findorFail($id);


    	if($destroyBlog->photo){
    		unlink('images/' .$destroyBlog->photo->photo);
    		$destroyBlog->photo()->delete('photo');
    	}	

    	$destroyBlog->forceDelete();
    	return redirect('/blog/bin');
    }




}
