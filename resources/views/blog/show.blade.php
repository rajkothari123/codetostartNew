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

<!-- end header -->



    <div class="page-title section lb">
        <div class="container">
            <div class="clearfix">
                <div class="title-area pull-left">
                    <h2>{{ $blog->title}}</h2>

                    <ul class="list-inline">
                        <li><i class="fa fa-clock-o"></i> <a href="" class="">{{$blog->time}} Mins</a></li>
                        <li><i class="fa fa-eye"></i> {{$blog->views}}</li>
                        @foreach($blog->category as $category)
                            <li><i class="fa fa-folder-open-o"></i> {{$category->name}}</li>
                        @endforeach
                        @foreach($course_name as $courseid)
                        <li><i class="fa fa-newspaper-o"><a href="{{ route('courses.show',$courseid->slug) }}"> {{$courseid->name}}</a></i> </li>
                        @endforeach


                    </ul>
                </div><!-- /.pull-right -->

                @if(Auth::user() ? Auth::user()->role->id==1 || Auth::user()->id==$blog->user_id : '')
        <a href="{{ action('BlogController@edit',[$blog->id])  }}">Edit</a>
        @endif
                <div class="pull-right hidden-xs">
                    <div class="bread">

                        @if($is_favourite)
                            <i  class="fa fa-heart fa-3x text-success" aria-hidden="true"></i> Favourite

                        @else
                            {!! Form::model($blog,['method'=>'POST','action'=>['BlogController@favourites',$blog->id]]) !!}
                            {{ Form::hidden('blog_id', $blog->id) }}
                            <button  style="background: none;padding: 0px;border: none;" type="submit" id="completed-task" class="fabutton">
                                <i style="color: red;" class="fa fa-heart-o fa-3x" aria-hidden="true"></i> Mark As Favourite
                            </button>

                            {!! Form::close() !!}
                        @endif                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end clearfix -->
        </div>
    </div><!-- end page-title -->

    <!-- Go to www.addthis.com/dashboard to generate a new set of sharing buttons -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="content col-md-9 col-sm-12">
                    {{--<div class="post-media">
                        <img src="upload/blog_08.jpg" alt="" class="img-responsive">
                    </div><!-- end media -->--}}


                    <div class="post-padding">
                        <div class="blog-big-title clearfix ">
                            @if($is_status)
                                <h4><i class="fa fa-check-circle-o fa-1x text-success" ></i><span style="color: #27ae60;"> You have Read</span></h4>
                            @else
                            <h4><i class="fa fa-hand-o-down fa-1x text-success" ></i> Continue Reading</h4>
                             @endif
                        </div>
                        <hr>

                        <p>{!! $blog->body !!}</p>

                        <hr>

{{--
                        <div class="tags clearfix">
                            <a href="#">web design</a>
                            <a href="#">club</a>
                            <a href="#">html5</a>
                            <a href="#">css3</a>
                        </div><!-- end tags -->
--}}

                    </div><!-- end post-padding -->

                    {{--<hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-widget">
                                <a href="#"><img src="upload/banner_02.jpg" alt="" class="img-responsive"></a>
                            </div>
                        </div>
                    </div><!-- end row -->--}}

                    {{--<div class="post-padding">
                        <div class="content-widget clearfix">
                            <div class="widget-title">
                                <h3>5 Comments</h3>
                                <hr>
                            </div>
                            <!-- end about -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="comments">
                                        <div class="panel panel-info">
                                            <div class="panel-body">
                                                <ul class="media-list">
                                                    <li class="media">
                                                        <div class="comment">
                                                            <a href="#" class="pull-left">
                                                                <img src="upload/team_01.png" alt="" class="img-circle">
                                                            </a>
                                                            <div class="media-body">
                                                                <strong class="text-success">Jane Doe</strong>
                                                                <span class="text-muted">
                                                                                                <small class="text-muted">6 days ago</small></span>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, <a href="#">#some link </a>.
                                                                </p>
                                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <ul class="media-list">
                                                            <li class="media">
                                                                <div class="comment">
                                                                    <a href="#" class="pull-left">
                                                                        <img src="upload/team_02.png" alt="" class="img-circle">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <strong class="text-success">MrAwesome</strong>
                                                                        <span class="text-muted">
                                                                                                        <small class="text-muted">2 days ago</small></span>
                                                                        <p>
                                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                                                                        </p>
                                                                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <div class="comment">
                                                                    <a href="#" class="pull-left">
                                                                        <img src="upload/team_03.png" alt="" class="img-circle">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <strong class="text-success">Miss Lucia</strong>
                                                                        <span class="text-muted">
                                                                                                        <small class="text-muted">15 minutes ago</small></span>
                                                                        <p>
                                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                                                                        </p>
                                                                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="media">
                                                        <div class="comment">
                                                            <a href="#" class="pull-left">
                                                                <img src="upload/team_03.png" alt="" class="img-circle">
                                                            </a>
                                                            <div class="media-body">
                                                                <strong class="text-success">Jana Cova</strong>
                                                                <span class="text-muted">
                                                                                                <small class="text-muted">12 days ago</small></span>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                                                                </p>
                                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <div class="comment">
                                                            <a href="#" class="pull-left">
                                                                <img src="upload/team_01.png" alt="" class="img-circle">
                                                            </a>
                                                            <div class="media-body">
                                                                <strong class="text-success">Johnatan Smarty</strong>
                                                                <span class="text-muted">
                                                                                                <small class="text-muted">1 month ago</small></span>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.
                                                                </p>
                                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end postpager -->

                        <div class="content-widget clearfix">
                            <div class="widget-title">
                                <h3>Comment Form</h3>
                                <hr>
                            </div>
                            <!-- end about -->

                            <div class="contact_form defaultform comment-form">
                                <form class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label>Website</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label>Comment <span class="required">*</span></label>
                                        <textarea class="form-control" placeholder=""></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="submit" value="Send Comment" class="btn btn-primary" />
                                    </div>
                                </form>
                            </div>
                            <!-- end commentform -->
                        </div>
                        <!-- end postpager -->
                    </div><!-- end post-padding -->--}}
                </div><!-- end content -->

                <div class="sidebar col-md-3 col-sm-12">

                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Previous Topic</h3>
                            <hr>
                        </div><!-- end widget-title -->

                        @foreach($previous_blog as $p)
                            <div class="related-posts">
                                <div class="entry">
                                    <p><a href="{{ action('BlogController@show',[$p->slug])  }}" title="">{{$p->title}}</a></p>
                                    <i class="fa fa-eye"></i> {{$p->views}}
                                    <hr class="largeinvis">
                                </div><!-- end entry -->
                            </div><!-- end related -->
                        @endforeach
                    </div><!-- end widget -->

                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Next Topics</h3>
                            <hr>
                        </div><!-- end widget-title -->

                        @foreach($next_blogs as $next_blog)
                            <div class="related-posts">
                                <div class="entry">
                                    <p><a href="{{ action('BlogController@show',[$next_blog->slug])  }}" title="">{{$next_blog->title}}</a></p>
                                    <i class="fa fa-eye"></i> {{$next_blog->views}}
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