<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}

</head>

<body class="external-page sb-l-c sb-r-c">


<div id="main" class="animated fadeIn">


    <section id="content_wrapper">


        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>


        <section id="content">

            <div class="admin-form theme-info" id="login1">

                <div class="row mb15 table-layout">

                    <div class="col-xs-6 va-m pln">
                        <a href="{{URL::route('homepage')}}" title="Homepage">
                            <img src="{{URL::asset('templates/theme/assets/img/logos/logo_white.png')}}" title="Telkom University Store" class="img-responsive w250">
                        </a>
                    </div>

                    <div class="col-xs-6 text-right va-b pr5">
                        <div class="login-links">
                            <a href="{{URL::route('account-sign-in')}}" class="active" title="Sign In">Sign In</a>
                            <span class="text-white"> | </span>
                            <a href="{{URL::route('account-create-account')}}" class="" title="Register">Register</a>
                        </div>

                    </div>

                </div>

                <div class="panel panel-info mt10 br-n pull-right btn-block">
                    <div class="panel-heading heading-border bg-white">
                        <span class="panel-title hidden"><i class="fa fa-sign-in"></i>Register</span>

                        @if(Session::has('success'))
                            <div class="alert alert-micro alert-border-left alert-success light alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check pr10"></i>
                                <strong>Well done!</strong> {{ Session::get('success')}}
                            </div>
                        @endif

                        @if(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-remove pr10"></i>
                                <strong>Oh snap!</strong> {{ Session::get('failed')}}
                            </div>
                        @endif

                        @if(Session::has('success-register'))
                            <div class="alert alert-system alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check pr10"></i>
                                <strong>Congratulation!</strong> {{ Session::get('success-register')}}

                            </div>
                        @endif

                        @if(Session::has('global'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-remove pr10"></i>
                                <strong>Oh snap!</strong> {{ Session::get('global')}}
                            </div>
                        @endif

                        <div class="section row mn">
                            <div class="col-sm-4">
                                <a href="#" class="button btn-social googleplus  btn-block">
                                    Telkom University SSO</a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{URL::route('facebookAuth')}}" class="button btn-social facebook span-left mr5 btn-block">
                                                    <span><i class="fa fa-facebook"></i>
                                                    </span>Facebook</a>
                            </div>

                            <div class="col-sm-4">
                                <a href="{{URL::route('googleAuth')}}" class="button btn-social googleplus span-left btn-block">
                                        <span><i class="fa fa-google-plus"></i>
                                        </span>Google+</a>
                            </div>
                        </div>

                    </div>



                        <div class="panel-body bg-light p30">
                            <div class="row">
                                <div class="col-sm-7 pr30">

                                    <div class="section row hidden">
                                        <div class="col-md-4">
                                            <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                                    <span><i class="fa fa-facebook"></i>
                                                    </span>Facebook</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                                    <span><i class="fa fa-twitter"></i>
                                                    </span>Twitter</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#" class="button btn-social googleplus span-left btn-block">
                                                    <span><i class="fa fa-google-plus"></i>
                                                    </span>Google+</a>
                                        </div>
                                    </div>

                                    <form action="{{URL::route('account-sign-in-post')}}" method="post"  id="contact">
                                                <div class="section">
                                                    <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                                    <label for="username" class="field prepend-icon">
                                                        <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username" {{ (Input::old('username')) ? ' value="'. e(Input::old('username')).'"':' ' }}>

                                                        @if($errors->has('username'))
                                                           <span class="text-danger">{{$errors->first('username')}}</span>
                                                        @endif
                                                        <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                        </label>
                                                    </label>
                                                </div>


                                                <div class="section">
                                                    <label for="password" class="field-label text-muted fs18 mb10">Password</label>
                                                    <label for="password" class="field prepend-icon">
                                                        <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password">
                                                        @if($errors->has('password'))
                                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                                        @endif
                                                        <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                        <div class="section">
                                            <div class="pull-right">
                                                <a href="{{URL::route('account-forgot-password')}}" class=""><i class="fa fa-question-circle"></i> Forget Password</a>
                                            </div>
                                        </div>


                                </div>
                                            <div class="col-sm-5 br-l br-grey pl30">
                                                <h3 class="mb25"> You'll Have Access To Your:</h3>
                                                <p class="mb15">
                                                    <span class="fa fa-check text-success pr5"></span> User's Dashboard</p>
                                                <p class="mb15">
                                                    <span class="fa fa-check text-success pr5"></span> Download unlimited freemium products</p>
                                                <p class="mb15">
                                                    <span class="fa fa-check text-success pr5"></span> Download premium products</p>

                                            </div>
                                </div>
                        </div>

                                    <div class="panel-footer clearfix p10 ph15">

                                        <label class="switch block switch-primary pull-left input-align mt10">
                                            <input type="checkbox" name="remember" id="remember" checked>
                                            <label for="remember" data-on="YES" data-off="NO"></label>
                                            <span>Remember me</span>
                                        </label>
                                        <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                                        {{Form::token()}}
                                    </div>

                                </form>
                </div>
            </div>

        </section>


    </section>

</div>


{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}
{{HTML::script('templates/theme/assets/js/pages/login/EasePack.min.js')}}
{{HTML::script('templates/theme/assets/js/pages/login/rAF.js')}}
{{HTML::script('templates/theme/assets/js/pages/login/TweenLite.min.js')}}
{{HTML::script('templates/theme/assets/js/pages/login/login.js')}}
{{HTML::script('templates/theme/assets/js/utility/utility.js')}}
{{HTML::script('templates/theme/assets/js/main.js')}}
{{HTML::script('templates/theme/assets/js/demo.js')}}


<!-- Page Javascript -->
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            },
        });


    });
</script>


</body>

</html>
