@include('includes.header')
<body class="">

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
    <!-- start header with navigation -->
@include('includes.navigation_detail')
    <!-- end header with navigation -->

    <div class="demo-parallax parallax section looking-photo" data-stellar-background-ratio="0.5" style="background-image:url('upload/demo.jpg');">
        <div class="container">
            <div class="row centermessage text-left">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="tagline"><h4>A Powerful<br>Website Template.</h4></div>
                    <p>We're among one of the best Education Bootstrap template on the Envato marketplace to build a powerful online university websites. The team family is a small collection of designers and who have one thing in common - we all love coding.</p>
                    <div class="text-left large-buttons">
                        <a target="_blank" href="{{  route('courses.index') }}" class="btn btn-primary btn-lg">VIEW OUR COURSES</a>
                    </div><!-- end title -->
                </div>
            </div>
        </div>
    </div><!-- end section -->

    {{--<div class="section db">
        <div class="container">
            <div class="row service-list alignleftlist">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="images/icons/lighticon_01.png" alt="" class="img-responsive alignleft">
                        <div class="widget-title">
                            <h3>Best Multi-Tier Courses</h3>
                            <hr>
                        </div><!-- end title -->
                        <p>EduPress is a powerful Education HTML template that comes with an easy template option interface. Suspendisse ante mi, iaculis ac eleifend id, venenatis non eros. Sed rhoncus gravida elit, eu sollicitudin sem iaculis..</p>
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="widget clearfix">
                        <img src="images/icons/lighticon_02.png" alt="" class="img-responsive alignleft">
                        <div class="widget-title">
                            <h3>Buy / Sell Courses</h3>
                            <hr>
                        </div><!-- end title -->
                        <p>If you are looking premium quality multi vendor learning template for your next website, the EduPress ideal for you! Suspendisse ante mi, iaculis ac eleifend id, venenatis non eros. Sed rhoncus gravida elit, eu.</p>
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="widget clearfix">
                        <img src="images/icons/lighticon_03.png" alt="" class="img-responsive alignleft">
                        <div class="widget-title">
                            <h3>Multi Purpose Dashboard</h3>
                            <hr>
                        </div><!-- end title -->
                        <p>With our awesome dashboard panels, you can showcase all your personal details, messages, social profiles. Suspendisse ante mi, ishowcaseaculis ac eleifend id, venenatis non eros. Sed rhoncus gravida elit...</p>
                    </div><!--widget -->
                </div><!-- end col -->
            </div>
        </div><!-- end container -->
    </div><!-- end section -->--}}

    <div class="section">
        <div class="container">
            <div class="big-title text-center">
                <h2>Most Popular Courses</h2>
                <hr class="customhr customhrcenter">
                <p class="lead">The EduPress template compatible with all mobile devices and modern browsers.<br>This template coded with Bootstrap Framework</p>
            </div><!-- end title -->

            <div class="row">
                @foreach($courses as $course)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="video-wrapper clearfix">
                        <div class="post-media">
                            <div class="entry">
                                <img src="/images/{{ $course->photo ? $course->photo->photo : '' }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="magni-desc">
                                        <a class="secondicon" href="{{  route('courses.index') }}"> <span class="oi" data-glyph="link-intact" title="Read More" aria-hidden="false"></span></a>
                                    </div><!-- end team-desc -->
                                </div><!-- end magnifier -->
                            </div>
                        </div><!-- end media -->

                        <div class="widget-title clearfix">
                            <div class="pull-left">
                                <h3><a href="{{ route('courses.show',$course->slug) }}">{{$course->name}}</a></h3>
                                <a href="">{{$course->username}}</a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-sm btn-inverse">FREE</a>
                            </div>
                        </div><!-- end title -->
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
                            </div>               </div><!-- end meta -->
                    </div><!--widget -->
                </div><!-- end col -->

                    @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center large-buttons nobot">
                        <a href="{{  route('courses.index') }}" class="btn btn-primary btn-lg">Browse All Courses &nbsp;&nbsp;&nbsp; <i class="fa fa-long-arrow-right"></i></a>
                    </div><!-- end title -->
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="section lb">
        <div class="container">
            <div class="big-title text-center">
                <h2>What Others Say About EduPress</h2>
                <hr class="customhrcenter customhr">
            </div><!-- end title -->

            <div class="row-fluid custom-list">
                <div class="col-md-6 col-sm-6">
                    <div class="testibox">
                        <img src="upload/testi_01.png" alt="" class="img-responsive alignleft img-circle wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <p>Thanks for your awesome video tutorials! Its helped me a lot! Pellentesque at tellus vitae augue sodales lobortis eget in ipsum.</p>
                        <h4>Amanda Martin</h4>
                        <small>Web Designer at <a href="#">Wikipedia</a></small>
                    </div>
                </div><!-- end col -->

                <div class="col-md-6 col-sm-6">
                    <div class="testibox">
                        <img src="upload/testi_02.png" alt="" class="img-responsive alignleft img-circle wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <p>When I need a education template, the EduPress helped me much! Its helped me a lot! Pellentesque at tellus vitaes lobortis eget in ipsu augue sodale.</p>
                        <h4>Bob Davidson</h4>
                        <small>CEO at <a href="#">Pedicalica</a></small>
                    </div>
                </div><!-- end col -->

                <div class="col-md-6 col-sm-6">
                    <div class="testibox">
                        <img src="upload/testi_03.png" alt="" class="img-responsive alignleft img-circle wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                        <p>The EduPress is an awesome website template for my next web design project. We used this template on our university site. Thanks PSDConvertHTML team!</p>
                        <h4>Jenny Sunders</h4>
                        <small>English Teacher at <a href="#">Harward Uni.</a></small>
                    </div>
                </div><!-- end col -->

                <div class="col-md-6 col-sm-6">
                    <div class="testibox">
                        <img src="upload/testi_04.png" alt="" class="img-responsive alignleft img-circle wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <p>Finally I got amazing template for our new site.. Thanks for build beautiful item man you're awesome! Pellentesque at tellus vitaes lobortis eget in ipsu augue.</p>
                        <h4>Darwin Luksenburg</h4>
                        <small>Founder at <a href="#">Material INC.</a></small>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="section">
        <div class="container">
            <div class="big-title text-center">
                <h2>Our Experts</h2>
                <hr class="customhr customhrcenter">
                <p class="lead">Who really happy to work with us a long time like a professional!<br> The guys build an awesome community since 2014!</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="our-team-content">
                        <div class="row">
                            <!-- Start single team member -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-team-member">
                                    <div class="team-member-img">
                                        <img src="upload/testi_01.png" alt="team member img" class="img-responsive">
                                    </div>
                                    <div class="team-member-name">
                                        <p>John Doe</p>
                                        <span>CEO</span>
                                    </div>
                                    <p>EduPress is a powerful Education HTML template that comes with an easy template option interface. Suspendisse ante mi. </p>
                                    <div class="team-member-link">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start single team member -->
                            <!-- Start single team member -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-team-member">
                                    <div class="team-member-img">
                                        <img src="upload/testi_02.png" alt="team member img" class="img-responsive">
                                    </div>
                                    <div class="team-member-name">
                                        <p>Bernice Neumann</p>
                                        <span>Designer</span>
                                    </div>
                                    <p>EduPress is a powerful Education HTML template that comes with an easy template option interface. Suspendisse ante mi.</p>
                                    <div class="team-member-link">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start single team member -->
                            <!-- Start single team member -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-team-member">
                                    <div class="team-member-img">
                                        <img src="upload/testi_03.png" alt="team member img" class="img-responsive">
                                    </div>
                                    <div class="team-member-name">
                                        <p>Jenny Cameron</p>
                                        <span>English Teacher</span>
                                    </div>
                                    <p>EduPress is a powerful Education HTML template that comes with an easy template option interface. Suspendisse ante mi.</p>
                                    <div class="team-member-link">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start single team member -->
                            <!-- Start single team member -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-team-member">
                                    <div class="team-member-img">
                                        <img src="upload/testi_04.png" alt="team member img" class="img-responsive">
                                    </div>
                                    <div class="team-member-name">
                                        <p>Bob Neumann</p>
                                        <span>Designer</span>
                                    </div>
                                    <p>EduPress is a powerful Education HTML template that comes with an easy template option interface. Suspendisse ante mi.</p>
                                    <div class="team-member-link">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start single team member -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="section lb">
        <div class="container">
            <div class="row awards-list">
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="upload/awards_01.png" alt="" class="img-responsive">
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="upload/awards_02.png" alt="" class="img-responsive">
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="upload/awards_03.png" alt="" class="img-responsive">
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="upload/awards_04.png" alt="" class="img-responsive">
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="upload/awards_05.png" alt="" class="img-responsive">
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="widget clearfix">
                        <img src="upload/awards_06.png" alt="" class="img-responsive">
                    </div><!--widget -->
                </div><!-- end col -->
            </div>
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