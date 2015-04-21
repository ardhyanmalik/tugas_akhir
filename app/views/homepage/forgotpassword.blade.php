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

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- begin canvas animation bg -->
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- Begin: Content -->
        <section id="content" class="animated fadeIn">

            <div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login1">
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

                <div class="panel panel-info mv10 heading-border br-n">

                    <form method="post" action="{{URL::route('account-forgotpassword-post')}}" id="contact">
                        <div class="panel-body bg-white p15 pt25">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    @foreach($errors->all('<ul>:message</ul>') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif

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

                            <div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info pr10"></i> Enter your <b>Email</b> and instructions will be sent to you!
                            </div>

                        </div>

                        <div class="panel-footer p25 pv15">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section mn">
                                        <label for="email" class="field-label text-muted fs18 mb10 hidden">Password Reset</label>
                                        <div class="smart-widget sm-right smr-80">
                                            <label for="email" class="field prepend-icon">
                                                <input type="text" name="email" id="email" class="gui-input" placeholder="Your Email Address">
                                                <label for="email" class="field-icon"><i class="fa fa-envelope-o"></i>
                                                </label>
                                            </label>
                                            <input type="submit" for="email" class="button" value="Reset"/>
                                            {{Form::token()}}
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end .form-footer section -->
                    </form>

                </div>

            </div>

        </section>
        <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->



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
