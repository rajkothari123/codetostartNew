<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Blog;

use DB;

use App\Role;

use App\Photo;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $roles=Role::pluck('name','id');
        return view('users.index',compact('users','roles'));
    }

    public function userlist()
    {
        $users=User::all();
        $roles=Role::pluck('name','id');
        return view('users.userlist',compact('users','roles'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        if(Auth::check()){
        $user=User::whereUsername($username)->first();
        $courses_enrolled=DB::table('course_user')
            ->join("courses as c", "c.id", "=", "course_user.course_id")
            ->where("course_user.user_id", "=", Auth::user()->id)
            ->select("c.name","c.slug","course_user.created_at")
            ->get();


        $user_favourites=DB::table('favourites_blog')
            ->join("blogs as b", "b.id", "=", "favourites_blog.blog_id")
            ->where("favourites_blog.user_id", "=", Auth::user()->id)
            ->select("b.title","b.slug")
            ->get();


        return view('users.show',compact('user','courses_enrolled','user_favourites'));
    }
        else
            $user=User::whereUsername($username)->first();
            return view('users.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user=User::whereUsername($username)->first();
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {

        $rules=[
         'photo_id' =>['mimes:jpeg,jpg,png'],        
        ];

        $this->validate($request,$rules);


        $input=$request->all();
        $user=User::whereUsername($username)->first();

        
        if($file=$request->file('photo_id')){


        if($user->photo){
            unlink('images/' .$user->photo->photo);
            $user->photo()->delete('photo');
        }    
        $name=$file->getClientOriginalName();
        $file->move('images',$name);
        $photo=Photo::create(['photo'=>$name,'name'=>$name]);
        $input['photo_id']=$photo->id;
        }
        
        $user->update($input);

        notify()->flash('Your Profile Updated','success',['timer'=>2000]);
        return Redirect::action('UserController@show',$user->username);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyUser=User::findorFail($id);


        if($destroyUser->photo){
            unlink('images/' .$destroyBlog->photo->photo);
            $destroyBlog->photo()->delete('photo');
        }   

        $destroyUser->forceDelete();
        notify()->flash('User Deleted','success',['timer'=>2000]);
        return back();

    }
}
