<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;
use App\User;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input=$request->all();
        $input['body']=$request->body;
        $input['course_id']=$request->course_id;
        $input['user_id']=Auth::user()->id;
        $input['email']=Auth::user()->email;
        $input['name']=Auth::user()->name;

        $comment=Comment::create($input);

        $users=DB::table('course_comments')
            ->where('course_comments.course_id', '=', $input['course_id'])
            /*->where('course_comments.user_id', '<>', $input['user_id'])*/
            ->select("email","name")->distinct()
            ->get();

        foreach ($users as $user) {

            Mail::send('emails.newblog',['user'=>$user],function($message) use ($user){
            $message->to($user->email)->from('raj.kothari90@gmail.com','Raj Kothari')->subject('A New Blog Has been posted');
            });

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
