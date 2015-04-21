<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/vendor/plugins/magnific/magnific-popup.css')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-plugins/admin-modal/adminmodal.css')}}


</head>
<body class="blank-page">

<div id="main">
    @include('dashboard.admin_moderator_header')
    @include('dashboard.moderator.menu_moderator')


    <section id="content_wrapper">
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="#">Account Setting</a>
                    </li>
                    <li class="crumb-trail">Dashboard</li>
                    <li class="crumb-trail">Account Setting</li>
                </ol>
            </div>

        </header>

        <section id="content" class="table-layout animated fadeIn">
            <aside class="tray tray-right w320 va-t" data-tray-height="match">

                <h4 class="ph10 mt10 mb15"> Profile Picture </h4>
                <hr class="mn br-light">
                <div class="fileupload fileupload-new admin-form mt20" data-provides="fileupload">
                    @if(Auth::user()->user_photo==null)
                        <div class="fileupload-preview thumbnail m5 mt20 mb30">
                            <img src="{{ URL::asset('assets/default_pict.png') }}"  alt="{{Auth::user()->user_photo}}">
                        </div>
                    @endif
                    @if(Auth::user()->user_photo!=null)
                        <div class="fileupload-preview thumbnail m5 mt20 mb30">
                            <img src="{{Auth::user()->user_photo}}"  alt="{{Auth::user()->user_photo}}">
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-xs-4 col-md-12 center-block">
                            {{Form::open(array('route'=>array('moderator-account-setting-update-profpict',Auth::user()->id_user),'files'=>true))}}

                            <span class="button btn-danger btn-file btn-block ph5">
                                    <span class="fileupload-new">Change Profile Image</span>
                                    <span class="fileupload-exists">Change File</span>
                                {{Form::file('user_photo')}}

                                </span>
                            <input class="form-control btn btn-system mt10" type="submit">
                            {{ Form::token() }}
                            {{Form::close()}}
                        </div>
                    </div>

                </div>



            </aside>


            <div class="tray tray-center pv5 ph5 va-t posr animated-delay animated-long" data-animate='["800","fadeIn"]'>
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
                @if(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-remove pr10"></i>
                        <strong>Oh snap!</strong> {{ Session::get('failed')}}
                    </div>
                @endif
                <div class="mw1100 center-block">
                    <div class="admin-form">
                        <div id="p1" class="panel heading-border">
                            <div class="panel-body bg-light">
                                <div class="section-divider mb40" id="spy1">
                                    <span>Account Information</span>
                                </div>

                                <div class="row">
                                    <form action="{{URL::route('moderator-account-setting-update-accouninfo',Auth::user()->id_user)}}" method="post">
                                        <div class="form-horizontal" role="form">
                                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                                <div class="section">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Full Name</label>
                                                        <div class="col-sm-12 col-md-8 col-lg-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-font"></i>
                                                        </span>
                                                            <input name="name" class="form-control" type="text"  value="{{Auth::user()->name}}"placeholder="Full Name" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Username</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i>
                                                        </span>
                                                            <input name="username" class="form-control" type="text" value="{{Auth::user()->username}}"placeholder="Username" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Email</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i>
                                                        </span>
                                                            <input name="email" class="form-control" type="text" value="{{Auth::user()->email}}"placeholder="Email" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Phone</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i>
                                                        </span>
                                                            <input name="user_phone" class="form-control" type="text" value="{{Auth::user()->user_phone}}"placeholder="Phone">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Address</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-8 input-group">
                                                            <div class="section">
                                                                <label class="field prepend-icon">
                                                                    <textarea class="gui-textarea" id="user_address" name="user_address" placeholder="Write down your valid address">{{Auth::user()->user_address}}</textarea>
                                                                    <label for="user_address" class="field-icon"><i class="fa fa-road"></i>
                                                                    </label>
                                                            <span class="input-footer">
                                                                <strong>Hint:</strong> Please make sure your address is right</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Introduction</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-8 input-group">
                                                            <div class="section">
                                                                <label class="field prepend-icon">
                                                                    <textarea class="gui-textarea" id="user_introduction" name="user_introduction" placeholder="Account's introduction goes here">{{Auth::user()->user_introduction}}</textarea>
                                                                    <label for="user_introduction" class="field-icon"><i class="fa fa-bell"></i>
                                                                    </label>
                                                            <span class="input-footer">
                                                                <strong>Hint:</strong> Please introduce yourself, write something about you</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8 input-group">
                                                            <input class="form-control btn btn-system" type="submit">
                                                            {{ Form::token() }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="section-divider mb40" id="spy1">
                                    <span>Change Password</span>
                                </div>

                                <div class="row">
                                    <form action="{{URL::route('moderatoraccount-setting-update-changepassword',Auth::user()->id_user)}}" method="post">
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-10 ">
                                                <div class="section">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label text-right">Old Password</label>
                                                        <div class="col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-key"></i>
                                                        </span>
                                                            <input name="oldpassword" class="form-control" type="password" placeholder="Old Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label text-right">New Password</label>
                                                        <div class="col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-key"></i>
                                                        </span>
                                                            <input name="newpassword" class="form-control" type="password" placeholder="New Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label text-right">Re-Type New Password</label>
                                                        <div class="col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-key"></i>
                                                        </span>
                                                            <input name="retypepass" class="form-control" type="password" placeholder="Re-Type New Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8 input-group">
                                                            <input class="form-control btn btn-system" type="submit">
                                                            {{ Form::token() }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="section-divider mb40" id="spy1">
                                    <span>Social Media Information</span>
                                </div>
                                <div class="row">
                                    <form action="{{URL::route('moderator-account-setting-update-socialinfo',Auth::user()->id_user)}}" method="post">
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-10 ">
                                                <div class="section">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label text-right">Facebook Link</label>
                                                        <div class="col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-facebook"></i>
                                                        </span>
                                                            <input name="facebook_link" class="form-control" type="text" placeholder="Facebook Link" value="{{Auth::user()->facebook_link}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label text-right">Twitter Link</label>
                                                        <div class="col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-twitter"></i>
                                                        </span>
                                                            <input name="twitter_link" class="form-control" type="text" placeholder="Twitter Link" value="{{Auth::user()->twitter_link}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label text-right">Google +</label>
                                                        <div class="col-md-8 input-group">
                                                        <span class="input-group-addon"><i class="fa fa-google-plus"></i>
                                                        </span>
                                                            <input name="google_link" class="form-control" type="text" placeholder="Google + Link" value="{{Auth::user()->google_link}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8 input-group">
                                                            <input class="form-control btn btn-system" type="submit">
                                                            {{ Form::token() }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </section>



    </section>



</div>




<!-- jQuery -->
{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}

{{HTML::script('templates/theme/vendor/plugins/magnific/jquery.magnific-popup.jss')}}
{{HTML::script('templates/theme/vendor/plugins/fileupload/fileupload.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/holder.min.js')}}


{{HTML::script('templates/theme/assets/js/utility/utility.js')}}
{{HTML::script('templates/theme/assets/js/main.js')}}
{{HTML::script('templates/theme/assets/js/demo.js')}}
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Theme Core
        Demo.init();

    });
</script>


</body>