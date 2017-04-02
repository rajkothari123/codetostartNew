@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>{{$course->name}}</h1>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" style="width:90%">
                 5 Stars
            </div>
            <div class="progress-bar progress-bar-warning" role="progressbar" style="width:5%">
                5 % Not Happy
            </div>
            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:5%">
                Danger
            </div>
        </div>

            @if(Auth::guest())
                <a href="{{ route('login') }}" role="button" class="btn btn-success btn-large">Start Learning</a>
            @elseif($is_enrolled)    
                <button  class="btn btn-success btn-large">Enrolled</button>
            @else 
                {!! Form::model($course,['method'=>'POST','action'=>['CourseController@enroll',$course->id]]) !!}
                {{ Form::hidden('course_id', $course->id) }}
                <div class="form-group">        
                {!! Form::submit("Enroll",['class'=>'btn btn-success']) !!}            
                </div>    
                {!! Form::close() !!}
            @endif




    </div>




        <div class="col-sm-8 col-sm-offset-1">
        @foreach($course_categories as $category)
            <article>
            <h4> {{$category->name}}</h4>
                @foreach($category->blog as $blog)
                    <article>
                        <p><a href="{{  action('BlogController@show',[$blog->slug])  }}" /> {{$blog->title}}</a></p>
                        @if(Auth::check())
                        @foreach($blogs as $bloge)
                            @if($bloge->blog_id==$blog->id && Auth::user()->id==$bloge->user_id)
                                <p>Done</p>
                            @endif
                        @endforeach
                         @endif

                    </article>
                @endforeach
            </article>
        @endforeach
    </div>


    <div class="col-sm-6">
        @if(Auth::check() && $is_enrolled)
            <h4>Comments</h4>
            <p>{{Auth::user()->name}}, your comments please</p>
            {!! Form::open(['method'=>'POST','action'=>'CommentController@store']) !!}
            {{ Form::hidden('course_id', $course->id) }}
            <div class="form-group">
                {!! Form::label("body","Description") !!}
                {!! Form::textarea("body",null,['class'=>'form-control','rows' => 2, 'cols' => 40]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit("Submit Comment",['class'=>'btn btn-primary']) !!}
            </div>


            {!! Form::close() !!}
        @endif
        </div>

        <div class="col-sm-6">

            <h4>All Comments</h4>

            @foreach($course->comment->reverse() as $comments)
                {{$comments->user->name}} commented:
                "{{$comments->body}}" . Commented on : {{$comments->created_at->diffForHumans()}}
                <hr>
            @endforeach
        </div>

        <h3>Related Courses</h3>
        @foreach($related_courses as $related_course)
            <p>{{$related_course->name}}</p>
        @endforeach

        <div>
</div>
</div>





</main>


<hr>
@endsection