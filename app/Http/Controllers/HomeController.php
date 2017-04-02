<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $courses=Course::latest()->get();

        return view('home',compact('courses'));
    }


    /*    public function test()
        {
            return view('blog.test');
        }

        public function send_email(Request $request)
        {
            $fields=$request->all();
             Mail::send('emails.test',['fields' => $fields], function($message) {
                $message->from('raj.kothari90@gmail.com');
                $message->to('raj.kothari90@gmail.com', 'Joseph Cammarata')->subject('Midtown Healthcare Contact Form From Website');

            });

        }*/

}
