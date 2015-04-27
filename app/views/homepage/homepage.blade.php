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
                <div class="col-md-3">
                    <div class="tray tray-center ph20 pv30 va-t posr">
                        <div class="row  mt5">
                            <div class="col-md-12 ">
                                <div class="row panel-body mt5" style="background: #EEEEEE;">
                                    <h3>Products</h3>

                                    <?php $i=1; ?>
                                    @foreach($parentproduct as $product)
                                        <div class="col-md-12 mb5 pb0">

                                            <div class="panel-group accordion accordion-lg mb5 pb0 " id="accordion{{ $i }}">
                                                @foreach($categoriesproduct as $categoryp)
                                                    @if($categoryp->id_parent == $product->id_category)
                                                        <a class="accordion-toggle accordion-icon link-unstyled collapsed mt5 mb0 pb0 fs15 fw400" data-toggle="collapse" data-parent="#accordion{{ $i }}" href="#accord{{ $i }}">
                                                            {{$product->category_name}}
                                                        </a>
                                                    @endif
                                                    @if($categoryp->id_parent == $product->id_category)
                                                        <div id="accord{{ $i }}" class="panel-body panel-collapse collapse mb0 ml5 pb5 pt5 pl0 animated fadeIn">
                                                            @foreach($subcategory as $categoryp)
                                                                @if($categoryp->id_parent == $product->id_category)
                                                                    <a href="{{URL::route('product-category-link',$categoryp->id_category)}}" class="link-unstyled center-block animated fadeIn mb5 fs14 ">{{$categoryp->category_name}}</a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        <?php $i++;?>
                                    @endforeach

                                    <h3>Services</h3>
                                    <?php $i=1; ?>
                                    @foreach($parentservice as $service)
                                        <div class="col-md-12 mb0 pb0">
                                            <div class="panel-group accordion accordion-lg mb5 pb0 " id="accordion{{ $i }}s">
                                                @foreach($categoriesproduct as $categorys)
                                                    @if($categorys->id_parent == $product->id_category)
                                                        <a class="accordion-toggle accordion-icon link-unstyled collapsed mt5 mb0 pb0 fs15 fw400" data-toggle="collapse" data-parent="#accordion{{ $i }}s" href="#accord{{ $i }}s">
                                                            {{$service->category_name}}
                                                        </a>
                                                    @endif
                                                    @if($categorys->id_parent == $product->id_category)
                                                        <div id="accord{{ $i }}s" class="panel-body panel-collapse collapse mb0 ml5 pb5 pt5 pl0 animated fadeIn">
                                                            @foreach($subcategorys as $categorys)
                                                            @if($categorys->id_parent == $service->id_category)
                                                                    <a href="{{URL::route('product-category-link',$categorys->id_category)}}" class="link-unstyled center-block animated fadeIn mb5 fs14 ">{{$categorys->category_name}}</a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <?php $i++;?>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8 mt10 mb20">

                    <div class="panel-body bg-light">
                        <div class="section-divider bg-light mt10 mb40 mr25">
                            <span>Freemium Products</span>
                        </div>
                    </div>

                    @foreach($freemium as $freemiums)
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="media">
                                <div class="col-md-2">
                                    <a class="media-left" href="{{$freemiums->produk_ava}}">
                                        <img src="{{$freemiums->produk_ava}}" alt="{{$freemiums->produk_title}}" width="100" height="100">
                                    </a>
                                </div>

                                <div class="col-md-7 mt5">
                                    <div class="media-body">
                                        <h3 class="media-heading">{{$freemiums->produk_title}}</h3>
                                        <h5 class="media-heading">
                                            <span class="text-system">{{$freemiums->produk_type}}</span>
                                            | <span class="text-danger-darker">{{$freemiums->category_name}}</span>
                                            @if($freemiums->version_available ==1)
                                                | <span class="text-primary">Open Innovation</span>
                                            @endif
                                        </h5>
                                        <p class="text-justify">
                                            {{$freemiums->produk_introduction}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    @if(Auth::check())
                                        <div class="col-md-12 ">
                                            <a href="{{URL::route('product-details',$freemiums->id_produk_detail)}}" class="btn btn-system mb10" style="min-width:100px;max-width:13px;">
                                                <i class="fa fa-info-circle"> Details</i>
                                            </a>
                                            <a href="{{URL::route('download-freemium',$freemiums->produk_link)}}" class="btn btn-system dark mb10" target="_blank" style="min-width:100px;max-width:13px;" >
                                                <i class="fa fa-download"> Download</i>
                                            </a>
                                        </div>
                                        <br>
                                    @else
                                        <div class="col-md-12">
                                            <a href="{{URL::route('product-details',$freemiums->id_produk_detail)}}" class="btn btn-system mt20" style="min-width:100px;max-width:13px;"><i class="fa fa-info-circle"> Details</i>
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




                    <div class="section-divider mt30 mb10"></div>

                    <div class="row mt5">
                        <div class="col-md-4 col-md-offset-8">
                            <a href="{{URL::route('product-list-showmore-freemium')}}" class="btn btn-system btn-lg btn-block ">Show More...</i>
                            </a>
                        </div>
                    </div>

                    <div class="panel-body bg-light">
                        <div class="section-divider bg-light mt10 mb40 mr25">
                            <span>Premium Products</span>
                        </div>
                    </div>

                    @foreach($premium as $premiums)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="media">
                                <div class="col-md-2">
                                    <a class="media-left" href="{{$premiums->produk_ava}}">
                                        <img src="{{$premiums->produk_ava}}" alt="{{$premiums->produk_title}}" width="100" height="100">
                                    </a>
                                </div>

                                <div class="col-md-7 mt5">
                                    <div class="media-body">
                                        <h3 class="media-heading">{{$premiums->produk_title}}</h3>
                                        <h5 class="media-heading">
                                            <span class="text-system">{{$premiums->produk_type}}</span> 
                                            | <span class="text-danger-darker">{{$premiums->category_name}}</span>
                                        </h5> 
                                         <?php
                                                $harga = $premiums->produk_harga;
                                                $angka = number_format($harga);
                                                $angka = str_replace(',', '.', $angka);
                                                $angka = "Rp. ".$angka;


                                        ?>
                                        <p class="text-danger">
                                            {{$angka}}
                                        </p>
                                        <p class="text-justify">
                                        {{$premiums->produk_introduction}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                @if(Auth::check())
                                    <div class="col-md-12">
                                        <a href="{{URL::route('product-details',$premiums->id_produk_detail)}}" class="btn btn-system "><i class="fa fa-info-circle"> Details</i>
                                        </a>
                                    </div>
                                    <br>
                                @else
                                    <div class="col-md-12">
                                        <a href="{{URL::route('product-details',$premiums->id_produk_detail)}}" class="btn btn-system btn-block "><i class="fa fa-info-circle"> Details</i>
                                        </a>
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="section-divider mt0 mb40"></div>
                    @endforeach

                    <div class="section-divider mt30 mb40"></div>

                    <div class="row mt5">
                        <div class="col-md-4 col-md-offset-8">
                            <a href="#" class="btn btn-system btn-lg btn-block ">Show More...</i>
                            </a>
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


</body>