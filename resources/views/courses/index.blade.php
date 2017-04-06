@include('includes.header')
<body>

<!-- PRELOADER -->
{{--
<div class="cssload-container">
    <div class="cssload-loader"></div>
</div>
--}}
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
                    <h2>Course List <small>A basic standard course list page.</small></h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Courses</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end clearfix -->
        </div>
    </div><!-- end page-title -->
    <br>


    @if (session('info'))
        <div style="text-align: center;" class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
            {{ session('info') }}
        </div>
    @endif


    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shoptop clearfix">
                        <div class="pull-left hidden-xs">
                            <p> Showing 1–9 of 12 results</p>
                        </div><!-- end col -->

                        <div class="pull-right">
                            <select class="form-control">
                                <option>Sort Descending</option>
                                <option>Sort by multiplying</option>
                                <option>Alphabetical order</option>
                            </select>
                        </div><!-- end col -->
                    </div><!--- end shop-top -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">

            @foreach($courses as $course)
                <div class="course-list normal-list">
                    <div class="video-wrapper course-widget clearfix">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="post-media">
                                    <div class="entry">
                                        <img src="/images/{{ $course->photo ? $course->photo->photo : '' }}" alt="" class="img-responsive">
                                        <div class="magnifier">
                                            <div class="magni-desc">
                                                <a class="secondicon" href="course-single.html"> <span class="oi" data-glyph="link-intact" title="Read More" aria-hidden="false"></span></a>
                                            </div><!-- end team-desc -->
                                        </div><!-- end magnifier -->
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

                                            {{$course->time($course->id)}} Mins
                                        </p>
                                    </div>
                                </div><!-- end meta -->
                            </div><!-- end col-->

                            <div class="col-md-9">
                                <div class="widget-title clearfix">
                                    <h3><a href="{{ route('courses.show',$course->slug) }}">{{$course->name}}</a></h3>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accidentx..</p>
                                    <hr>

                                    <div class="bottom-line clearfix">
                                        <div class="pull-left">
                                            <a href="member-profile.html" class="readmore"><img src="upload/testi_01.png" class="img-circle" alt="">{{$course->username}}</a>
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

            @endforeach



            <div class="row text-center">
                <div class="col-md-12">
                    <nav>
                        <ul class="pagination">
                            {!! $courses->links() !!}
                        </ul>
                    </nav>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    @include('includes.footer')
</div><!-- end wrapper -->

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