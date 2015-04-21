<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/vendor/plugins/nestable/nestable.css')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}


</head>
<body class="bg-light" style="height:auto;">

@include('homepage.homepage_header')
<section id="content" class="animated fadeIn">
    <div class="container">
        <div class="jumbotron">
            <div class="admin-form">
                <form action="{{URL::route('advance-search')}}" method="get">
                    <div class="smart-widget sm-right smr-50">
                        <label class="field">
                            <input type="text" name="keywords" id="keywords" class="gui-input" placeholder="Type keywords for searching...">
                        </label>
                        <button type="submit" class="button"> <i class="fa fa-search"></i>
                        </button>

                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="admin-form">
                <div class="col-md-4">
                    <div class="tray tray-center ph20 pv30 va-t posr">
                        <div class="row  mt5">
                            <div class="col-md-12 ">
                                <div class="row panel-body mt5" style="background: #EEEEEE;">
                                    <h3>Filter By</h3>

                                    <div class="row col-md-12 ">
                                        <div class=" mt5 mb5">
                                            <span class="center-block label label-default ">Product Category</span>
                                        </div>

                                        <div class="section ">
                                            <label class="field select">
                                                {{ Form::select('productcategory', $category , Input::old('productcategory',array('id' => 'productcategory'))) }}
                                                <i class="arrow double"></i>
                                            </label>
                                        </div>

                                        <div class="mt5 mb5">
                                            <span class="center-block label label-default ">Product Information</span>
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox-custom fill mb5">
                                                <input type="checkbox" checked="" id="checkboxDefault13">
                                                <label for="checkboxDefault13">Contributor Name</label>
                                            </div>

                                            <div class="radio-custom square radio-default mb5">
                                                <input type="radio" id="FreemiumItems" name="producttype">
                                                <label for="FreemiumItems">Freemium Items</label>
                                            </div>

                                            <div class="radio-custom square radio-default mb5">
                                                <input type="radio" id="PremiumItems" name="producttype">
                                                <label for="PremiumItems">Premium Items</label>
                                            </div>

                                        </div>

                                        <div class="mt5 mb5">
                                            <span class="center-block label label-default ">Sort by Time</span>
                                        </div>

                                        <div class="form-group">

                                            <div class="radio-custom square radio-default mb5">
                                                <input type="radio" id="lastestoldest" name="timeby">
                                                <label for="lastestoldest">Lastest - Oldest</label>
                                            </div>

                                            <div class="radio-custom square radio-default mb5">
                                                <input type="radio" id="oldestlastest" name="timeby">
                                                <label for="oldestlastest">Oldest - Lastest</label>
                                            </div>

                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8 mt10 mb20">

                    <div class="panel-body bg-light">
                        <div class="section-divider bg-light mt10 mb40 mr25">
                            <span>Search Result</span>
                        </div>

                        <div class="row col-md-12">
                            <div class="alert alert-dark light alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info pr10"></i>
                                <strong>Total</strong> search result :
                                <a href="#" class="alert-link">{{count($counter)}} items</a>.
                            </div>

                        </div>

                        @foreach($queries as $query)
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="media">
                                        <div class="col-md-2">
                                            <a class="media-left" href="{{$query->produk_ava}}">
                                                <img src="{{$query->produk_ava}}" alt="{{$query->produk_title}}" width="100" height="100">
                                            </a>
                                        </div>

                                        <div class="col-md-7 mt5">
                                            <div class="media-body">
                                                <h3 class="media-heading">{{$query->produk_title}}</h3>
                                                <h5 class="media-heading">
                                                    <span class="text-system">{{$query->produk_type}}</span>
                                                    | <span class="text-danger-darker">{{$query->category_name}}</span>
                                                    @if($query->version_available ==1)
                                                        | <span class="text-primary">Open Innovation</span>
                                                    @endif
                                                </h5>
                                                <p class="text-justify">
                                                    {{$query->produk_introduction}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            @if(Auth::check())
                                                <div class="col-md-12 ">
                                                    <a href="{{URL::route('product-details',$query->id_produk_detail)}}" class="btn btn-system mb10" style="min-width:100px;max-width:13px;">
                                                        <i class="fa fa-info-circle"> Details</i>
                                                    </a>
                                                    <a href="{{URL::route('download-freemium',$query->produk_link)}}" class="btn btn-system dark mb10" target="_blank" style="min-width:100px;max-width:13px;" >
                                                        <i class="fa fa-download"> Download</i>
                                                    </a>
                                                </div>
                                                <br>
                                            @else
                                                <div class="col-md-12">
                                                    <a href="{{URL::route('product-details',$query->id_produk_detail)}}" class="btn btn-system mt20" style="min-width:100px;max-width:13px;"><i class="fa fa-info-circle"> Details</i>
                                                    </a>
                                                </div>
                                                <br>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="section-divider mt0 mb40"></div>
                        @endforeach
                        <div class="row">
                            <div class="pull-right">

                                {{$queries->appends(Request::only('keywords'))->links()}}
                            </div>
                        </div>
                    </div>

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
<script>
    $(function(){
        $('#productcategory').change(function(e) {
           url:
        });
    });
</script>


</body>