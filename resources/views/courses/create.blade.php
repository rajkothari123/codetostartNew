@extends('layouts.app')

@section('content')
@include('partials.tiny')




    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Create New Course</h1>
            </div>

            <div class="col-sm-8 col-sm-offset-1">

                {!! Form::open(['method'=>'POST','action'=>'CourseController@store','files'=>'true']) !!}
                @include('partials.error_msg')
                <div class="form-group">
                    {!! Form::label("name","Name of the course") !!}
                    {!! Form::text("name",null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("tagline","Tagline") !!}
                    {!! Form::text("tagline",null,['class'=>'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label("photo_id","Featured Image") !!}
                    {!! Form::file("photo_id",null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("body","About the course (120 words)") !!}
                    {!! Form::textarea("body",null,['class'=>'form-control']) !!}
                </div>

                 <div class="form-group">
                    {!! Form::submit("Launch New Course",['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </main>


    <hr>

    <script src="http://code.jquery.com/jquery.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $("#taglist").select2();

    </script>
@endsection






