<header class="header normal-header default-header" data-spy="affix" data-offset-top="197">
    <div class="container">
        <nav class="navbar navbar-default yamm">
            <div class="container-full">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand with-text" title="PSD to HTML" href="{{  action('HomeController@home') }}">CodetoStart.</a>
                </div>
                <!-- end navbar header -->

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        {{--<li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle active">Home <b class="fa fa-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content clearfix">
                                        <div class="row-fluid">
                                            <div class="col-md-2 col-sm-4 col-xs-12">
                                                <p>Homepages</p>
                                                <hr>
                                                <ul class="menu-item">
                                                    <li><a href="index.html">Default Version</a></li>
                                                    <li><a href="index-boxed.html">Boxed Version</a></li>
                                                    <li><a href="index-01.html">Home Alternative 01</a></li>
                                                    <li><a href="index-02.html">Home Alternative 02</a></li>
                                                    <li><a href="index-03.html">Home Alternative 03</a></li>
                                                    <li><a href="index-04.html">Home Alternative 04</a></li>
                                                    <li><a href="index-05.html">Home Alternative 05</a></li>
                                                    <li><a href="index-06.html">Home Alternative 06</a></li>
                                                    <li><a href="index-07.html">Home Alternative 07</a></li>
                                                    <li><a href="index-08.html">Home Alternative 08</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2 col-sm-4 col-xs-12">
                                                <p>Course Pages</p>
                                                <hr>
                                                <ul class="menu-item">
                                                    <li><a href="course-list.html">Courses List View</a></li>
                                                    <li><a href="course-grid.html">Courses Grid View</a></li>
                                                    <li><a href="course-filterable-3.html">Courses Filterable 3</a></li>
                                                    <li><a href="course-filterable-4.html">Courses Filterable 4</a></li>
                                                    <li><a href="course-filterable-5.html">Courses Filterable 5</a></li>
                                                    <li><a href="course-sidebar.html">Courses With Sidebar</a></li>
                                                    <li><a href="course-single.html">Course Single</a></li>
                                                    <li><a href="course-single-alt.html">Course Single Alt</a></li>
                                                    <li><a href="course-quiz.html">Course Quiz</a></li>
                                                    <li><a href="course-checkout.html">Course Checkout</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2 col-sm-4 col-xs-12">
                                                <p>User Dashboard</p>
                                                <hr>
                                                <ul class="menu-item">
                                                    <li><a href="member-profile.html">Member Profile</a></li>
                                                    <li><a href="member-courses.html">Member Courses</a></li>
                                                    <li><a href="member-achievements.html">Member Achievements</a></li>
                                                    <li><a href="member-messages.html">Member Messages</a></li>
                                                    <li><a href="member-friends.html">Member Friends</a></li>
                                                    <li><a href="member-profile-edit.html">Member Profile Edit</a></li>
                                                    <li><a href="member-login.html">Member Login</a></li>
                                                    <li><a href="member-register.html">Member Register</a></li>
                                                    <li><a href="forum-single.html">Member Single Forum</a></li>
                                                    <li><a href="blog-archive.html">Member Blog Archive</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-md-3 col-sm-12 col-xs-12">
                                                <p>Popular Courses</p>
                                                <hr>
                                                <div class="postpager">
                                                    <div class="pager">
                                                        <div class="post clearfix">
                                                            <a href="course-single.html">
                                                                <img alt="" src="upload/pager_04.jpg" class="img-responsive alignleft">
                                                                <h4>Learning Web Design & Development</h4>
                                                                <small>View Course</small>
                                                            </a>
                                                        </div>

                                                        <div class="post clearfix">
                                                            <a href="course-single.html">
                                                                <img alt="" src="upload/pager_05.jpg" class="img-responsive alignleft">
                                                                <h4>Graphic Design Introduction Course</h4>
                                                                <small>View Course</small>
                                                            </a>
                                                        </div>

                                                        <div class="post clearfix">
                                                            <a href="course-single.html">
                                                                <img alt="" src="upload/pager_06.jpg" class="img-responsive alignleft">
                                                                <h4>Social Media Marketing Strategy</h4>
                                                                <small>View Course</small>
                                                            </a>
                                                        </div>

                                                        <a href="#" class="btn btn-primary">View all courses</a>
                                                    </div>
                                                </div><!-- end postpager -->
                                            </div>


                                            <div class="col-md-3 hidden-sm hidden-xs">
                                                <div class="menu-widget">
                                                    <a href="#"><img src="upload/banner_01.jpg" alt="" class="img-responsive"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>--}}
                        {{--<li><a title="" href="page-about.html">About</a></li>--}}
                        <li><a title="" href="{{  route('courses.index') }}">Browse Courses</a></li>
                        <li><a title="" href="forum.html">Experts Cafe</a></li>
                        {{--<li class="dropdown normal-menu has-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="page-pricing.html">Pricing & Plan</a></li>
                                <li><a href="page-become-a-trainer.html">Become a Trainer</a></li>
                                <li><a href="page-team.html">The Teachers</a></li>
                                <li><a href="page-testimonials.html">Happy Students</a></li>
                                <li><a href="page.html">Default Page</a></li>
                                <li><a href="page-fullwidth.html">Fullwidth Page</a></li>
                                <li><a href="page-404.html">Not Found</a></li>
                                <li><a href="page-sitemap.html">Sitemap</a></li>
                                <li><a href="page-elements.html">All Elements</a></li>
                            </ul>
                        </li>--}}
                        {{--<li class="dropdown normal-menu has-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog.html">Blog List Layout</a></li>
                                <li><a href="blog-1.html">Blog Normal Layout</a></li>
                                <li><a href="blog-2.html">Blog No Sidebar</a></li>
                                <li><a href="blog-3.html">Blog Grid Sidebar</a></li>
                                <li><a href="blog-4.html">Blog Grid Fullwidth</a></li>
                                <li><a href="blog-single.html">Blog Single Sidebar</a></li>
                                <li><a href="blog-single-1.html">Blog Single Fullwidth</a></li>
                            </ul>
                        </li>
                        <li><a title="" href="page-contact.html">Contact</a></li>--}}
                    </ul>


                    <ul  class="nav navbar-nav navbar-right">

                        @if (Auth::guest())
                        <li class="btn btn-success btn-block"><a title="Join for free" href="{{ route('login') }}">Join us</a></li>
                         @else
                            {{--<li>
                                <a href="{{ action('UserController@show',Auth::user()->username) }}" style="color: #fff;" >
                                    Hello, {{ Auth::user()->name }}
                                </a>
                            </li>--}}
                        <li><a href="{{ action('UserController@show',Auth::user()->username) }}">Hello,{{Auth::user()->name}}</a> </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>


                        @endif

                    </ul>
                    <!-- end dropdown -->
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <!-- end nav -->
    </div>
    <!-- end container -->
</header>