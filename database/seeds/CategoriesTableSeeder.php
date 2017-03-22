<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=new Category();
    	$category->name='Installtion & Introduction';
    	$category->slug='instal-intro';
        $category->course_id=1;
        $category->preference=1;
    	$category->save();


    	$category=new Category();
    	$category->name='Variables';
    	$category->slug='variables';
        $category->course_id=1;
        $category->preference=2;
    	$category->save();

    	$category=new Category();
    	$category->name='Functions';
    	$category->slug='function';
        $category->course_id=2;
        $category->preference=3;
    	$category->save();

    }
}
