<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    @include('master.meta')
    {{HTML::style('templates/theme/landing-page/landing1/countdown/css/jquery.classycountdown.min.css')}}
    {{HTML::style('templates/theme/landing-page/landing1/countdown/css/jquerysctipttop.css')}}
    {{HTML::style('templates/theme/landing-page/landing1/offline/css/bootstrap.min.css')}}
    {{HTML::style('templates/theme/landing-page/landing1/css/theme.css')}}


    <!-- Custom Fonts -->
    {{HTML::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:300,400,500,700')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic')}}

    {{HTML::script('templates/theme/landing-page/landing1/offline/js/html5shiv.js')}}
    {{HTML::script('templates/theme/landing-page/landing1/offline/js/respond.min.js')}}


</head>

<body id="page-top" class="index">

<nav class="navbar navbar-default">


    <div class="container" style="max-width: 1050px;">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">TEL-US.</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active hidden">
                    <a href="#page-top">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="#telus">TEL-US</a>
                </li>
                <li>
                    <a class="page-scroll" href="#launch">Launch</a>
                </li>
                <li>
                    <a class="page-scroll" href="#portfolio">Pages</a>
                </li>
                <li>
                    <a class="page-scroll" href="#subscribe">Subscribe</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{URL::route('homepage')}}">Visit Store</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Hero Content -->
<header id="hero">
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading mb20">
                Telkom University Store an <b>e-marketplace</b> Solution of Service
            </div>
            @if ($errors->any())

                    <div class="alert alert-danger alert-dismissable mb5">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all('<ul>:message</ul>') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>

            @endif

            @if(Session::has('success'))
                    <div class="alert alert-dark light alert-dismissable mb5">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check pr10"></i>
                        <strong>{{ Session::get('success') }}!</strong>
                    </div>

            @endif
            <a href="#launch" class="page-scroll btn btn-xl mr30 btn-primary">Soft Launching <i class="fa fa-rocket"></i></a>

        </div>
    </div>
</header>

<!-- Services Section -->
<section id="telus">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="section-heading">Telkom University Store</h2>
                <h3 class="section-subheading text-muted">e-marketplace in educational environment</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-xs-6 col-sm-4 mb50">
                    <span class="fa-stack fa-4x hidden">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                <div class="service-icon"> <img src="{{URL::asset('templates/theme/landing-page/landing1/img/icons/1-lg.png')}}" title="service icon"> </div>
                <h4 class="service-heading">E-Commerce</h4>
                <p class="text-muted">
                    Expand your market with minimum capital investment, by an e-Commerce concept transaction
                </p>
            </div>
            <div class="col-xs-6 col-sm-4 mb50">
                <div class="service-icon"> <img src="{{URL::asset('templates/theme/landing-page/landing1/img/icons/2-lg.png')}}" title="service icon"> </div>
                    <span class="fa-stack fa-4x hidden">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Open Innovation</h4>
                <p class="text-muted">
                    Help each other in an environment to develop and explore your product, to meet your necessities
                </p>
            </div>
            <div class="col-xs-6 col-sm-4 mb50">
                <div class="service-icon"> <img src="{{'templates/theme/landing-page/landing1/img/icons/3-lg.png'}}" title="service icon"> </div>
                    <span class="fa-stack fa-4x hidden">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Roles</h4>
                <p class="text-muted">
                    Original products made and developed by <strong>Lecturer</strong> and <strong>Students</strong> of Telkom University
                </p>
            </div>

            <div class="col-xs-6 col-sm-4 mb50">
                    <span class="fa-stack fa-4x hidden">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                <div class="service-icon"> <img src="{{URL::asset('templates/theme/landing-page/landing1/img/icons/4-lg.png')}}" title="service icon"> </div>
                <h4 class="service-heading">Premium Product</h4>
                <p class="text-muted">
                    Looking for additional income? come join us, mark your product as an <strong>Premium Product</strong>
                </p>
            </div>
            <div class="col-xs-6 col-sm-4 mb50">
                <div class="service-icon"> <img src="{{URL::asset('templates/theme/landing-page/landing1/img/icons/5-lg.png')}}" title="service icon"> </div>
                    <span class="fa-stack fa-4x hidden">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Freemium Product</h4>
                <p class="text-muted">
                    Build a <strong>free</strong>,<strong> amazing product</strong>, with additional feature and collaborate with others to improve your product
                </p>
            </div>
            <div class="col-xs-6 col-sm-4 mb50">
                <div class="service-icon"> <img src="{{URL::asset('templates/theme/landing-page/landing1/img/icons/6-lg.png')}}" title="service icon"> </div>
                    <span class="fa-stack fa-4x hidden">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Categories</h4>
                <p class="text-muted">
                    Categorized based on your <strong>needs</strong>, ensuring a ease and comfort usability for an item you've looking for
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Flat Features Section -->
<section id="launch" class="bg-light">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-6 text-center">
                <h2 class="section-heading mt70">Telkom University Store</h2>
                <h3 class="section-subheading text-muted mb30">educational environment e-marketplace </h3>
                <p class="text-muted mb50">
                    We're still working, prepare yourself to join us.
                    <strong>Telkom University Store</strong> soft launching will begin in :
                </p>
                <div id="countdown17" class="ClassyCountdownDemo"></div>

            </div>
            <div class="hidden-sm hidden-xs col-md-6">
                <img src="{{URL::asset('templates/theme/landing-page/landing1/img/features/flat_feature1.png')}}" title="iMac Image" class="img-responsive pull-right">
            </div>
        </div>

    </div>
</section>


<!-- Features Section -->
<section id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Telkom University Store</h2>
                <h3 class="section-subheading text-muted mbn">
                    Feel new experiences of our advanced e-marketplace solution
                </h3>


            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-md-12 hidden">
                <!-- <img src="img/features/1.png" title="iMac Image" class="img-responsive pull-right mtn30"> -->
            </div>
        </div>

    </div>
</section>

<!-- Portfolio Grid Section -->
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading mt20">Pages</h2>
                <h3 class="section-subheading text-muted">Here are Our Preview</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="{{URL::asset('templates/theme/landing-page/landing1/img/portfolio/landingpage.png')}}" class="img-responsive" alt="landingpage">
                </a>
                <div class="portfolio-caption">
                    <h4>Landing Page</h4>
                    <p class="text-muted">Available</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="{{URL::asset('templates/theme/landing-page/landing1/img/portfolio/homepage.png')}}" class="img-responsive" alt="homepage">
                </a>
                <div class="portfolio-caption">
                    <h4>Telkom University Store Homepage</h4>
                    <p class="text-muted">Comming Soon</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="{{URL::asset('templates/theme/landing-page/landing1/img/portfolio/autheticationpreview.png')}}" class="img-responsive" alt="Sign-up | Sign-in">
                </a>
                <div class="portfolio-caption">
                    <h4>Sign-up | Sign-in</h4>
                    <p class="text-muted">Comming Soon</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Feel free to subscribe and be part of our development by became one of our tester!</h2>
            </div>
        </div>

        <form action="{{URL::route('account-subscribe')}}" method="post" class="mw450 center-block clearfix">
            <div class="center-block mb10 clearfix">
                <input type="text" name="id_contributor" class="form-control" placeholder="NIP ID or NIM ID" id="id_subcribe">
            </div>
            <div class="center-block mb10 clearfix">
                <input type="text" name="name" class="form-control" placeholder="Full Name" id="subcribe_name">
            </div>
            <div class="center-block mb10 clearfix">
                <input type="email" name="email" class="form-control" placeholder="Valid Email" id="subcribe_email">
            </div>
            <div class="center-block clearfix">
                <input type="submit" class="btn btn-xl btn-block btn-wire" value="Subscribe">
                {{ Form::token() }}
            </div>
        </form>

        <p> By subscribing you agree to our terms and conditions. </p>

    </div>
</section>

<!-- Footer -->
<footer id="subscribe">
    <div class="container mw850">
        <div class="row">
            <div class="col-md-6 text-left">
                <span class="copyright text-muted">Copyright &copy; <b>ARD RMD</b> 2015</span>
            </div>
            <div class="col-md-6 text-right">
                <ul class="list-inline social-buttons">
                    <li><a href="#" title="Facebook Link"><i class="fa fa-facebook-square"></i></a>
                    </li>
                    <li><a href="#" title="Google+ Link"><i class="fa fa-google-plus-square"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 hidden">
                <ul class="list-inline quicklinks">
                    <li><a href="#">Privacy Policy</a>
                    </li>
                    <li><a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <!-- Project Details Go Here -->
                        <h2>Landing Page</h2>
                        <img class="img-responsive" src="/templates/theme/landing-page/landing1/img/portfolio/landingpagepreview.png" alt="landing page tel-us">
                        <p>
                            This landing page exist to inform, getting your attention and awareness of our product.
                            Be part of our progress by subscribe and be one of our tester
                            any help would be appreciated
                        </p>

                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 2 -->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Homepage</h2>
                        <img class="img-responsive img-centered" src="/templates/theme/landing-page/landing1/img/portfolio/homepagepreview.png" alt="">
                        <p>
                            Find our information of product ,catagorized based on your needs by accessing our Homepage

                        </p>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 3 -->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <!-- Project Details Go Here -->
                        <h2>Sign-in | Sign-up Page</h2>
                        <img class="img-responsive img-centered" src="/templates/theme/landing-page/landing1/img/portfolio/autheticationpreview.png" alt="">
                        <p>
                            Connect with your social media account for an ease and convenience of using our service,
                            you can manage information related to your personal data later

                        </p>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 4 -->


<!-- Portfolio Modal 5 -->


<!-- Portfolio Modal 6 -->



{{HTML::script('templates/theme/landing-page/landing1/offline/js/jquery.min.js')}}
{{HTML::script('templates/theme/landing-page/landing1/offline/js/jquery.easing.min.js')}}
{{HTML::script('templates/theme/landing-page/landing1/offline/js/bootstrap.min.js')}}
{{HTML::script('templates/theme/landing-page/landing1/js/vendor/jqBootstrapValidation.js')}}

{{HTML::script('templates/theme/landing-page/landing1/js/main.js')}}

{{HTML::script('templates/theme/landing-page/landing1/countdown/js/jquery.knob.js')}}
{{HTML::script('templates/theme/landing-page/landing1/countdown/js/jquery.throttle.js')}}
{{HTML::script('templates/theme/landing-page/landing1/countdown/js/jquery.classycountdown.min.js')}}

<script>
    $(document).ready(function() {
        var target_date = new Date("<?php echo date("5/1/2015 18:00:00"); ?>");
        var current_date=new Date($.now());
        var timenow=(target_date-current_date)/1000 ;
        $('#countdown17').ClassyCountdown({
            theme: "flat-colors-very-wide",

            end: $.now() + timenow
        });
    });
</script>

</body>

</html>
