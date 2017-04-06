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
<!-- /#sidebar-wrapper -->

    <div id="page-content-wrapper">
        <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
        <div class="page-title section lb">
            <div class="container">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2>{{$user->name}} <small>@ {{ $user->username }}</small></h2>
                    </div><!-- /.pull-right -->
                    <div class="pull-right hidden-xs">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Single Course</li>
                            </ol>
                        </div><!-- end bread -->
                    </div><!-- /.pull-right -->
                </div><!-- end clearfix -->
            </div>
        </div><!-- end page-title -->

        <div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="about-widget clearfix">
                            {{--<div class="widget-title">
                                <h3>About Me</h3>
                                <hr>
                            </div><!-- end title -->--}}
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="team-member-img text-center">
                                        <img src="/images/{{ $user->photo ? $user->photo->photo : '' }}" alt="team member img" class="img-responsive">
                                        <br>
                                        <a href="#" class="btn btn-default btn-sm">Follow me</a>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-9 col-sm-12">
                                    <div class="team-member-name">
                                        <p>Profile Summary</p>
                                        <span><a style="color: red;" href="{{ route('users.edit',$user->username)  }}">Edit</a> </span>
                                    </div>
                                    <p>Howdy, welcome to the my profile, we build professional responsive and retina ready template for online learning websites! With our professional course pages, you can earn money from your online courses. Join us today! Create and share outstanding quiz's, ask questions and get answer from your awesome clients!</p>



                                    <hr class="invis">

                                    <div class="widget-title">
                                        <h3>Social Links</h3>
                                        <hr>
                                    </div><!-- end title -->

                                    <ul class="customlist">
                                        <li><a href="{{ $user->facebook}}"> <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $user->twitter}}"> <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $user->github}}"> <i class="fa fa-git-square fa-2x" aria-hidden="true"></i></a></li>


                                    </ul>

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    {{--<div class="col-md-5 col-sm-12 m30">
                        <div class="about-widget clearfix">
                            <div class="widget-title">
                                <h3>Contact With Me</h3>
                                <hr>
                            </div><!-- end title -->

                            <div class="defaultform">
                                <form class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="col-md-12 clearfix">
                                        <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Message Below"></textarea>
                                        <button type="submit" value="SEND" id="submit" class="btn btn-primary"> Send Form</button>
                                    </div>
                                </form>
                            </div>

                        </div><!-- end about-widget -->
                    </div><!-- end col -->
                    --}}

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->
@if(Auth::check())
@if($user->id==Auth::user()->id)
        <div class="section lb">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-md-offset-3">
                    <div class="col-md-3">
                        <div class="clearfix">
                            <div class="widget-title">
                                <h3>Courses Enrolled ({{$courses_enrolled->count()}})</h3>
                                <hr>
                            </div><!-- end title -->
                            @foreach($courses_enrolled as $course_enrolled )
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <div class="video-wrapper">
                                        <div class="widget-title clearfix">
                                            <h3><a href="">{{$course_enrolled->name}}</a></h3>
                                            {{--<div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>--}}
                                            <small><a style="color: red;" href="{{ route('courses.show',$course_enrolled->slug) }}">View Course</a><br>- Started : {{ date('F d, Y', strtotime($user->created_at)) }}</small>
                                        </div><!-- end title -->
                                    </div><!-- end video-wrapper -->
                                </div>
                            </div><!-- end row -->
                            @endforeach
                            <hr>

                        </div>
                    </div>
@foreach($user_favourites as $user_favourite)
                    <div class="col-md-3">
                        <div class="clearfix">
                            <div class="widget-title">
                                <h3>Favourites ({{$user_favourites->count()}})</h3>
                                <hr>
                            </div><!-- end title -->
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <div class="video-wrapper">
                                        <div class="widget-title clearfix">
                                            <h3><a href="">{{$user_favourite->title}}</a></h3>
                                            {{--<div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>--}}
                                            <small><a style="color: red;" href="{{ action('BlogController@show',[$user_favourite->slug])  }}">View Blog</a></small>
                                        </div><!-- end title -->
                                    </div><!-- end video-wrapper -->
                                </div>
                            </div><!-- end row -->
                            <hr>

                        </div>
                    </div>
    @endforeach
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->
@endif
@endif

    @include('includes.footer')
        <!-- end copyrights -->
    </div>
    <!-- end page-content-wrapper -->
</div>
<!-- end wrapper -->

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