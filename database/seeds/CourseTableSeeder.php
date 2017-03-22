<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $course=new Course();
    	$course->name='Laravel';
    	$course->slug='laravel';
    	$course->save();


    	 $course=new Course();
    	$course->name='PHP';
    	$course->slug='php';
    	$course->save();

       }
}

