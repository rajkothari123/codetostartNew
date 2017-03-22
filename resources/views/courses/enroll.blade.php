@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>{{$course->name}}</h1>

        @if(Auth::user())
    <a href="{{  route('CourseController@enroll',[$course->id]) }}" role="button" class="btn btn-success btn-large">Enroll</a>
        @else
  <a href="{{  route('login') }}" role="button" class="btn btn-success btn-large">Start Learning Now</a>
        @endif
      


    </div>

    <div class="col-sm-8 col-sm-offset-1">
        
        @foreach($course_categories as $category)
        <article>
        <h4> {{$category->name}}</h4>
            @foreach($category->blog as $blog)
        <article>
        <p><a href="{{  action('BlogController@show',[$blog->slug])  }}" /> {{$blog->title}}</a></p>
        </article>
            @endforeach
        </article>
        @endforeach





    </div>
    </div>
</main>


<hr>
@endsection