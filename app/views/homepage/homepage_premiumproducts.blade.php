<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}


</head>
<body class="bg-light" style="height:auto;">
@include('homepage.homepage_header')
<section id="content" class="animated fadeIn">
    <div class="container">
        <div class="jumbotron">
            <div class="admin-form">
                <div class="smart-widget sm-right smr-50">
                    <label class="field">
                        <input type="text" name="sub" id="sub" class="gui-input" placeholder="Search Product...">
                    </label>
                    <button type="submit" class="button"> <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="admin-form">
                <div class="col-md-3">
                    <ul class="list-unstyled col-sm-offset-2">
                        <li class="mt10 mb10">
                            <a href="#">Category 1</a>
                        </li>
                        <li class="mt10 mb10">
                            <a href="#">Category 2</a>
                        </li>
                        <li class="mt10 mb10">
                            <a href="#">Category 3</a>
                        </li>
                        <li class="mt10 mb10">
                            <a href="#">Category 4</a>
                        </li>
                        <li class="mt10 mb10">
                            <a href="#">Category 5</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-8 mt10 mb20">
                    <div class="section-divider mt10 mb40 mr25">
                        <span>Premium Products</span>
                    </div>

                    <div class="media">
                        <a class="media-left" href="#">
                            <img data-src="holder.js/80x80" alt="holder-img">
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Product Title</h3>
                            <p class="text-justify">
                                Product Description....
                                Product Description....
                                Product Description....
                                Product Description....
                                Product Description....
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-8">

                                <a href="{{URL::route('products-premium-products-details')}}" class="btn btn-system "><i class="fa fa-info-circle"> Details</i>
                                </a>
                                <a href="#" class="btn btn-system dark"><i class="fa fa-download"> Demo</i>
                                </a>
                                <a href="{{URL::route('products-premium-products-purchase')}}" class="btn btn-system dark"><i class="fa fa-shopping-cart"> Purchase</i>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="section-divider mt30 mb40"></div>

                    <div class="media">
                        <a class="media-left" href="#">
                            <img data-src="holder.js/80x80" alt="holder-img">
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Product Title</h3>
                            <p class="text-justify">
                                Product Description....
                                Product Description....
                                Product Description....
                                Product Description....
                                Product Description....
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-8">
                                <a href="{{URL::route('products-premium-products-details')}}" class="btn btn-system "><i class="fa fa-info-circle"> Details</i>
                                </a>
                                <a href="#" class="btn btn-system dark"><i class="fa fa-download"> Demo</i>
                                </a>
                                <a href="{{URL::route('products-premium-products-purchase')}}" class="btn btn-system dark"><i class="fa fa-shopping-cart"> Purchase</i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider mt30 mb10"></div>

                </div>

            </div>
        </div>
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