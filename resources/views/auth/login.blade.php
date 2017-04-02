@include('includes.header')
<body>


<!-- ******************************************
START SITE HERE
********************************************** -->

<div id="wrapper">
    @include('includes.navigation_detail')
    <div class="container">

    <div class="row">
        <hr class="invis">


        @if (session('info'))
            <div style="text-align: center;" class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                {{ session('info') }}
            </div>
        @endif

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="text-align: center;" class="panel-heading">Sign In </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-4 col-md-offset-4">
                        <span>OR</span>
                        <br>
                        <a href="/redirect">
                    <img width="300" height="75" src="/images/facebook-login.png">
                        </a>
                    </div>


                </div>
            </div>
        </div>

    </div>

</div>







</div>

<script src="js/all.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
