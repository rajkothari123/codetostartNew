@extends('layouts.app')

@section('content')


    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Draft Course </h1>
            </div>

            <div class="col-sm-8 col-sm-offset-1">

                @foreach($courses as $course)
                    <article>
                        <h1><a href="#" />{{$course->name}}</a></h1> <br>


                        {!! Form::model($course,['method'=>'PATCH','action'=>['CourseController@publish',$course->id],'files'=>'true']) !!}
                        <div class="form-group">
                            {!! Form::submit("Publish",['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </article>
                    <hr class="invis">

                @endforeach


            </div>
        </div>
    </main>


    <hr>
@endsection