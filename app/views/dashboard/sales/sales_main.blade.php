<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}


</head>
<body class="blank-page">

<div id="main">
    @include('dashboard.admin_moderator_header')
    @include('dashboard.sales.menu_sales')


    <section id="content_wrapper">
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="crumb-trail">Menu</li>
                    <li class="crumb-trail">Dashboard</li>
                </ol>
            </div>

        </header>



        <section id="content" class="animated fadeIn">
            Dashboard content goes here...
        </section>


    </section>



</div>




<!-- jQuery -->
{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}
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