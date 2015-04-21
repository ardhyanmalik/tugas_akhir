<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}

    {{HTML::style('templates/theme/vendor/plugins/magnific/magnific-popup.css')}}
    {{HTML::style('templates/theme/vendor/plugins/slick/slick.css')}}
    {{HTML::style('templates/theme/assets/js/utility/highlight/styles/googlecode.css')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-plugins/admin-modal/adminmodal.css')}}


</head>
<body class="bg-light" style="height:auto;">

@include('homepage.homepage_header')
<section id="content" class="animated fadeIn">
    <div class="container">
        <header id="topbar" class="mt5 mb20">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-icon">
                        <a href="#">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-link">
                        <a href="/">HomePage</a>
                    </li>
                    <li class="#">User Profile</li>
                </ol>
            </div>
        </header>

        <section id="content" class="pn animated fadeIn">

            <!-- <div class="p40 bg-background bg-topbar bg-psuedo-tp"> -->
            <div class="pv30 ph40 bg-light dark br-b br-grey posr">
                <div class="table-layout">
                    <div class="w200 text-center pr30 hidden-xs">
                        <img src="/templates/theme/assets/img/avatars/profile_avatar.jpg" class="responsive">
                    </div>
                    <div class="va-t m30">

                        <h2 class=""> Full Name <small> Profile </small></h2>
                        <p class="fs15 mb20">Introduction From Users</p>
                        <a href="#" class="btn btn-default pull-right">
                            Message
                        </a>

                        <ul class="list-inline list-unstyled">
                            <li>
                                <a href="#" title="facebook link">
                                    <span class="fa fa-facebook-square fs35 text-primary"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="twitter link">
                                    <span class="fa fa-twitter-square fs35 text-info"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="google plus link">
                                    <span class="fa fa-google-plus-square fs35 text-danger"></span>
                                </a>
                            </li>
                            <li>

                            </li>

                        </ul>

                    </div>
                </div>
            </div>

            <div class="p25 pt35">
                <div class="row">
                    <div class="col-md-4">

                        <h4 class="page-header mtn br-light text-muted hidden">User Info</h4>

                        <div class="panel">
                            <div class="panel-heading">
                                    <span class="panel-icon"><i class="fa fa-star"></i>
                                    </span>
                                <span class="panel-title"> Track Record</span>
                            </div>
                            <div class="panel-body pn">
                                <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="fa fa-check-circle-o text-system"></span>
                                        </td>
                                        <td>Products</td>
                                        <td><i class=" text-info pr10"></i>10</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fa fa-tags text-system"></span>
                                        </td>
                                        <td>Categories</td>
                                        <td><i class="text-danger pr10"></i>2</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">

                        <h4 class="page-header text-muted mtn br-light hidden">User Activity</h4>



                        <div class="tab-block psor">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">Activity</a>
                                </li>
                            </ul>
                            <div class="tab-content" style="height: 725px;">
                                <div id="tab1" class="tab-pane active p15">
                                    <div class="media pb10">
                                        <a class="pull-left" href="#"> <img class="media-object mn thumbnail mw50" src="/templates/theme/assets/img/avatars/4.jpg" alt="..."> </a>
                                        <div class="media-body">
                                            <h5 class="media-heading mb20">Full Name <small> - 25/02/2015</small></h5>
                                            <img src="/templates/theme/assets/img/stock/1.jpg" class="mw140 mr25 mb20"><img src="/templates/theme/assets/img/stock/2.jpg" class="mw140 mr25 mb20"> <img src="/templates/theme/assets/img/stock/3.jpg" class="mw140 mb20">
                                        </div>
                                    </div>

                                    <div class="media pb15">
                                        <a class="pull-left" href="#"> <img class="media-object thumbnail mw50" src="/templates/theme/assets/img/avatars/5.jpg" alt="..."> </a>
                                        <div class="media-body">
                                            <h5 class="media-heading mb20">Full Name <small> - 25/02/2015</small></h5>
                                            <img src="/templates/theme/assets/img/stock/4.jpg" class="mw140 mr25 mb20"><img src="/templates/theme/assets/img/stock/2.jpg" class="mw140 mr25 mb20"> <img src="/templates/theme/assets/img/stock/5.jpg" class="mw140 mb20">
                                        </div>
                                    </div>

                                    <div class="admin-form hidden">
                                        <div class="panel mb30">
                                            <label class="field prepend-icon">
                                                <textarea class="gui-textarea br-light h-50" id="comment" name="comment" placeholder="Text area"></textarea>
                                                <label for="comment" class="field-icon"><i class="fa fa-comments"></i>
                                                </label>
                                                    <span class="input-footer">
                                                        <strong>Hint:</strong>Don't be negative or off topic! just be awesome...</span>
                                            </label>
                                            <div class="panel-footer text-right br-t-n p8 hidden">
                                                <button type="button" class="btn btn-primary p4 ph10">Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane"></div>
                                <div id="tab3" class="tab-pane"></div>
                                <div id="tab4" class="tab-pane"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

</section>



{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}

{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}

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