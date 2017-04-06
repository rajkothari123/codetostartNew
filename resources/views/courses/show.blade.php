@include('includes.header')
<body>

<!-- PRELOADER -->
{{--<div class="cssload-container">
    <div class="cssload-loader"></div>
</div>--}}
<!-- end PRELOADER -->

<!-- ******************************************
START SITE HERE
********************************************** -->

<div id="wrapper">
@include('includes.navigation_detail')
<!-- end header -->

    <div class="page-title section lb">
        <div class="container">
            <div class="clearfix">
                <div class="title-area pull-left">
                    <h2>{{$course->name}} <small>{{$course->tagline}}</small></h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="{{  route('courses.index') }}"> Courses</a></li>
                            <li class="active">{{$course->name}}</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end clearfix -->
        </div>
    </div><!-- end page-title -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="content col-md-9 col-sm-12">
                    <div class="course-list normal-list">
                        <div class="video-wrapper course-widget clearfix">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <div class="entry">
                                            <img src="/images/{{ $course->photo ? $course->photo->photo : '' }}" alt="" class="img-responsive">
                                        </div>
                                    </div><!-- end media -->
                                    <div class="course-meta clearfix">
                                        <div class="pull-left">
                                            <p><i class="fa fa-users"></i> {{$course->user->count()}}</p>
                                        </div>

                                        <div class="pull-right">
                                            <p><i class="fa fa-comment-o"></i> {{$course->comment->count()}}</p>
                                        </div>

                                        <div style="text-align: center;">
                                            <p><i class="fa fa-clock-o"></i>

                                                @foreach($course_times as $course_time)
                                                    {{round($course_time->times)}} Mins

                                                @endforeach
                                            </p>
                                        </div>

                                    </div><!-- end meta -->
                                    <hr>

                                    @if(Auth::guest())
                                        <input type="button" class="btn btn-success btn-block btn-lg" value="Start Learning" onclick="location.href='{{route('login')}}'">
                                    @elseif($is_enrolled)
                                        <input type="button" class="btn btn-success btn-block btn-lg" value="Enrolled" onclick="">
                                    @else
                                        {!! Form::model($course,['method'=>'POST','action'=>['CourseController@enroll',$course->id]]) !!}
                                        {{ Form::hidden('course_id', $course->id) }}
                                        <div class="form-group">
                                            {!! Form::submit("Enroll",['class'=>'btn btn-success btn-block btn-lg']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    @endif
                                </div><!-- end col-->

                                <div class="col-md-8">
                                    <div class="widget-title clearfix">
                                        <h3>Why You Should Start Reading About This Course?</small></h3>
                                        <hr>
                                        <p>{!! $course->body !!}</p>


                                        <hr>

                                        <div class="bottom-line clearfix">
                                            <div class="pull-left">
                                                <a href="member-profile.html" class="readmore">By : {{$course->username}}</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="course-single.html" class="btn btn-sm btn-inverse">FREE</a>
                                            </div>
                                        </div><!-- end bottom -->
                                    </div><!-- end title -->
                                </div><!-- end col -->
                            </div>
                        </div><!--widget -->
                    </div><!-- end row -->

                    <hr class="largeinvis">



                    @if(Auth::check() && $is_enrolled && $total!=0)
                        <div class="widget-title">
                            <h3>Course Progress</h3>
                            <hr>
                        </div><!-- end widget-title -->
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:{{$total}}%">
                                {{$total}}% Completed
                            </div>
                        </div>
                    @endif

                    @if(Auth::check() && $is_enrolled && $total==0)
                        <div class="widget-title">
                            <h3>Course Progress</h3>
                            <hr>
                        </div><!-- end widget-title -->
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                Track Your Course Progress Here :)
                            </div>
                        </div>
                    @endif
                    <hr class="largeinvis">
                    <div class="widget-title">
                        <h3>Course Lessons</h3>
                        <hr>
                    </div><!-- end widget-title -->

                    <div class="course-list normal-list">
                        <div class="video-wrapper course-widget clearfix">
                            <div class="course-table">
                                @foreach($course_categories as $category)
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="25%">Module</th>
                                            <th width="25%">{{$category->name}}</th>
                                            <th width="25%">Time</th>
                                            @if($is_enrolled)
                                                <th width="25%">Read</th>
                                            @else
                                                <th width="25%">Actions</th>
                                            @endif

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($category->blog as $blog) <!-- Original Blogs : cipla ,phizer in blogs table-->
                                        <tr>
                                            <td><i class="fa fa-sticky-note-o" aria-hidden="true"></i></td>
                                            <td>
                                                @if($is_enrolled)
                                                    <a href="{{  action('BlogController@show',[$blog->slug])  }}" > {{$blog->title}}</a>
                                                @else
                                                    <a href="javascript:AlertIt();">{{$blog->title}}</a>
                                                @endif
                                            </td>
                                            <td>{{$blog->time}} Min</td>
                                            @if($is_enrolled)

                                                @if($blog->check_read_status($blog->id)=="FALSE")
                                                        <td><i  class="fa fa-close"></i></td>
                                                @else
                                                        <td><i  class="fa fa-check"></i></td>
                                                @endif

                                            @else
                                                <td>Please Enroll</td>
                                            @endif
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                @endforeach


                            </div><!-- end course-table -->
                        </div><!--widget -->
                    </div><!-- end row -->

                    <hr class="largeinvis">

                    {{--<div class="widget-title">
                        <h3>Related Courses</h3>
                        <hr>
                    </div><!-- end widget-title -->

                    <div class="row course-list">
                        @foreach($related_courses as $related_course)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 wow fadeIn">
                            <div class="video-wrapper course-widget clearfix">
                                <div class="post-media">
                                    <div class="entry">
                                        <img src="/images/{{ $related_course->photo ? $related_course->photo : '' }}" alt="" class="img-responsive">
                                        <div class="magnifier">
                                            <div class="magni-desc">
                                                <a class="secondicon" href="course-single.html"> <span class="oi" data-glyph="link-intact" title="Read More" aria-hidden="false"></span></a>
                                            </div><!-- end team-desc -->
                                        </div><!-- end magnifier -->
                                    </div>
                                </div><!-- end media -->

                                <div class="widget-title clearfix">
                                    <h3><a href="course-single.html">{{$related_course->name}}</a></h3>

                                    <hr>
                                    <div class="bottom-line clearfix">
                                        <div class="pull-left">
                                            <a href="member-profile.html" class="readmore"><img src="upload/testi_01.png" class="img-circle" alt="">Michael Denson</a>
                                        </div>

                                        <div class="pull-right">
                                            <a href="course-single.html" class="btn btn-sm btn-inverse">$20.00</a>
                                        </div>
                                    </div><!-- end bottom -->
                                </div><!-- end title -->

                                <div class="course-meta clearfix">
                                    <div class="pull-left">
                                        <p><i class="fa fa-users"></i> 21</p>
                                    </div>
                                    <div class="pull-right">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div><!-- end meta -->
                            </div><!--widget -->
                        </div><!-- end col -->

                        @endforeach
                    </div>--}}
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

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget-title">
                                    <h3>Comments ({{$course->comment->count()}})</h3>
                                    <hr>
                                </div><!-- end title -->


                                @foreach($course->comment->reverse() as $comments)
                                    <div class="friendbox clearfix">
                                        <div class="row">
                                            <div class="col-md-3">
                                                {{-- <div class="team-member-img">
                                                     <a href="#"><img src="upload/testi_01.png" alt="team member img" class="img-responsive alignleft"></a>
                                                 </div>--}}
                                                <div class="team-desc">
                                                    <h3><a href="#">{{$comments->user->name}}</a></h3>
                                                    {{--<small>Student</small>--}}
                                                    <small><a href="#">{{$comments->created_at->diffForHumans()}}</a></small>
                                                    {{--<a href="#" class="btn btn-primary btn-sm">Unfollow</a>--}}
                                                </div><!-- end team-desc -->
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{$comments->body}}</p>
                                                {{--<a href="#" class="btn btn-default btn-sm">Reply</a>--}}
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end friendbox -->
                                @endforeach


                            </div><!-- end col -->
                        </div><!-- end row -->

                        {{--<div class="row">
                            <div class="col-md-12">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->--}}

                    </div><!-- end container -->
                </div><!-- end content -->



                <div class="sidebar col-md-3 col-sm-12">
                    {{--<div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Search</h3>
                            <hr>
                        </div><!-- end widget-title -->
                        <form>
                            <input type="text" name="search" class="form-control" placeholder="Site search...">
                        </form>
                    </div><!-- end widget -->--}}



                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Related Free Courses</h3>
                            <hr>
                        </div><!-- end widget-title -->

                        @foreach($related_courses as $related_course)
                            <div class="related-posts">
                                <div class="entry">
                                    <a href="#"><img src="/images/{{ $related_course->photo }}" alt="" class="img-responsive"></a>
                                    <p><a href="blog-single.html" title="">{{$related_course->name}}</a></p>

                                    <hr class="largeinvis">
                                </div><!-- end entry -->
                            </div><!-- end related -->
                        @endforeach
                    </div><!-- end widget -->






                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->




    @include('includes.footer')
</div><!-- end wrapper -->




<script type="text/javascript">
    function AlertIt() {
        var answer = alert("Oops...", "Something went wrong!", "error");

    }
</script>


<!-- ******************************************
/END SITE
********************************************** -->

<!-- ******************************************
DEFAULT JAVASCRIPT FILES
********************************************** -->
<script src="js/all.js"></script>
<script src="js/custom.js"></script>

</body>
</html>