<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}
    {{HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}
    {{HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')}}

</head>

<body class="external-page sb-l-c sb-r-c">


<script>
    var boxtest = localStorage.getItem('boxed');
    if (boxtest === 'true') {
        document.body.className += ' boxed-layout';
    }
</script>

<div id="main" class="animated fadeIn">


    <section id="content_wrapper">


        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>


        <section id="content" class="">

            <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

                <div class="row mb15 table-layout">

                    <div class="col-xs-6 va-m pln">
                        <a href="dashboard.html" title="Return to Dashboard">
                            <img src="/templates/theme/assets/img/logos/logo_white.png" title="AdminDesigns Logo" class="img-responsive w250">
                        </a>
                    </div>

                    <div class="col-xs-6 text-right va-b pr5">
                        <div class="login-links">
                            <a href="{{URL::route('account-sign-in')}}" class="" title="Sign In">Sign In</a>
                            <span class="text-white"> | </span>
                            <a href="{{URL::route('account-create-account')}}" class="active" title="Register">Register</a>
                        </div>
                    </div>

                </div>
 
                <div class="panel panel-info mt10 br-n">

                    <div class="panel-heading heading-border bg-white">
                        <div class="section row mn">
                        </div>
                    </div>

                    <form action="{{ URL::route('account-create-post') }}" method="post"  id="account2">
                        <div class="panel-body p25 bg-light">


                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach($errors->all('<ul>:message</ul>') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
 
                        @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="fa fa-check pr10"></i>
                                    <strong>{{ Session::get('success') }}!</strong>
                                </div>
 
                        @endif
                            <div class="section-divider mt10 mb40">
                                <span>Set up your account</span>
                            </div>


                            <div class="section">
                                <label for="name" class="field prepend-icon">
                                    <input type="text" name="name" id="name" class="gui-input" placeholder="Full name" {{ (Input::old('name')) ? ' value="'. e(Input::old('name')).'"':' ' }}>
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                    <label for="name" class="field-icon"><i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>


                            <div class="section">
                                <label for="email" class="field prepend-icon">
                                    <input type="email" name="email" id="email" class="gui-input" placeholder="Email address" {{ (Input::old('email')) ? ' value="'. e(Input::old('email')).'"':' ' }}>
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                    <label for="email" class="field-icon"><i class="fa fa-envelope"></i>
                                    </label>
                                </label>
                            </div>


                            <div class="section">
                                    <label for="username" class="field prepend-icon">
                                        <input type="text" name="username" id="username" class="gui-input" placeholder="Choose your username" {{ (Input::old('username')) ? ' value="'. e(Input::old('username')).'"':' ' }}>
                                        @if($errors->has('username'))
                                            <span class="text-danger"> {{$errors->first('username')}}</span>
                                        @endif
                                        <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                        </label>
                                    </label>
                            </div>


                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="password" id="password" class="gui-input" placeholder="Create a password">
                                    @if($errors->has('password'))
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                    <label for="password" class="field-icon"><i class="fa fa-unlock-alt"></i>
                                    </label>
                                </label>
                            </div>


                            <div class="section">
                                <label for="confirmPassword" class="field prepend-icon">
                                    <input type="password" name="confirmPassword" id="confirmPassword" class="gui-input" placeholder="Retype your password">
                                    @if($errors->has('confirmPassword'))
                                        <span class="text-danger"> {{$errors->first('confirmPassword')}}</span>
                                    @endif
                                    <label for="confirmPassword" class="field-icon"><i class="fa fa-lock"></i>
                                    </label>
                                </label>
                            </div>

                        </div>

                        <div class="panel-footer clearfix">
                            <button type="submit" class="button btn-primary pull-right">Create Account</button>
                            {{ Form::token() }}
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
                x: window.innerWidth / 2.1,
                y: window.innerHeight / 4.2
            },
        });
    });
</script>



</body>

</html>
