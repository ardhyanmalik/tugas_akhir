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
    {{HTML::style('templates/theme/assets/admin-tools/admin-plugins/admin-dock/dockmodal.css')}}

    {{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js')}}
    {{HTML::script('templates/theme/assets/stepper/jquery.stepper.min.js')}}
    {{HTML::style('templates/theme/assets/stepper/jquery.stepper.min.css')}}
    {{HTML::style('fancybox/source/jquery.fancybox.css?v=2.1.5')}}
    {{HTML::style('fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')}}
    {{HTML::style('fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7')}}

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
                        <a href="{{URL::route('homepage')}}">HomePage</a>
                    </li>
                    <li class="#">Product Details</li>
                </ol>
            </div>
        </header>

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
                    @foreach($produkdetail as $produk)
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 mt10 mb20">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 mt30 mb30">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img src="{{$produk->produk_ava}}" alt="{{$produk->produk_title}}" width="150" height="150">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="media-heading">{{$produk->produk_title}}</h3>
                                            <h5 class="media-heading">
                                                {{$produk->name}} | <span class="text-system">{{$produk->produk_type}}</span>
                                                    | <span class="text-danger-darker">{{$produk->category_name}}</span>
                                                @if($produk->version_available ==1)
                                                    | <span class="text-primary">Open Innovation</span>
                                                @endif
                                            </h5>
                                            <h6 class="media-heading">{{$produk->produk_downloaded}} Downloaded</h6>
                                            @if($produk->produk_type == "Premium")
                                            <?php
                                                $harga = $produk->produk_harga;
                                                $angka = number_format($harga);
                                                $angka = str_replace(',', '.', $angka);
                                                $angka = "Rp. ".$angka;


                                            ?>
                                            <h2 class="media-heading text-system">{{ $angka }}</h2>
                                            @endif
                                            @if(Auth::check())
                                                @if($produk->produk_type== "Freemium")
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 mt15 mb5 pn">
                                                    <a href="{{URL::route('download-freemium',$produk->produk_link)}}" class="media-heading btn btn-lg btn-system dark" target="_blank"><i class="fa fa-download"> Download</i>
                                                    </a>
                                                </div>
                                                @endif
                                                @if($produk->produk_type == "Premium")
                                                <div class="col-sm-12 col-md-6">
                                                    <a href="{{URL::route('products-product-cart',$produk->id_produk)}}" class="media-heading btn btn-lg btn-system dark"><i class="fa fa-download"> Download</i>
                                                    </a>
                                                    <button id="button2" type="submit" class="button btn-primary">Purchase</button>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    {{-- href-nya arahin ke fungsi di controller.. default-nya method get, kalau mau post gampang. banyak tutorialnya di google yan. --}}
                                                    <a href="{{URL::route('products-product-cart',$produk->id_produk)}}" class="various fancybox.ajax btn btn-lg btn-system mt10 center-block"><i class="fa fa-shopping-cart"></i>Add to Chart</a>
                                                </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt20">
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <section id="content" class="pn animated fadeIn">
                                            <div class="col-xs-12 col-sm-12 col-md-12 center-block demo-block">
                                                <div class="row table-layout">
                                                        <div class="slider-demo7 col-xs-12 col-sm-12 col-md-12">
                                                            <div class="center-mode">
                                                                <div class="slick-slide">
                                                                    <div class="media popup-gallery center-block">
                                                                        <a class="media-left" href="{{$produk->produk_pict_1}}" title="{{$produk->produk_title}}">
                                                                            <img src="{{$produk->produk_pict_1}}" width="100" height="100">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="slick-slide">
                                                                    <div class="media popup-gallery center-block">
                                                                        <a class="media-left" href="{{$produk->produk_pict_2}}" title="{{$produk->produk_title}}">
                                                                            <img src="{{$produk->produk_pict_2}}" width="100" height="100">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                @if($produk->produk_pict_3 !=null)
                                                                <div class="slick-slide ">
                                                                    <div class="media popup-gallery center-block">
                                                                        <a class="media-left" href="{{$produk->produk_pict_3}}" title="{{$produk->produk_title}}">
                                                                            <img src="{{$produk->produk_pict_3}}" width="100" height="100">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if($produk->produk_pict_4 !=null)
                                                                <div class="slick-slide ">
                                                                    <div class="media popup-gallery center-block">
                                                                        <a class="media-left" href="{{$produk->produk_pict_4}}" title="{{$produk->produk_title}}">
                                                                            <img src="{{$produk->produk_pict_4}}" width="100" height="100">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if($produk->produk_pict_5 !=null)
                                                                <div class="slick-slide ">
                                                                    <div class="media popup-gallery center-block">
                                                                        <a class="media-left" href="{{$produk->produk_pict_5}}" title="{{$produk->produk_title}}">
                                                                            <img src="{{$produk->produk_pict_5}}" width="100" height="100">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </section>
                                </div>
                            </div>
                            @if($produk->produk_video_youtube !=null)
                            <div class="row mt15">
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <div id="dock-content" class="ph20">
                                        <div id="dock-video">
                                            <div class="dock-item" data-title="Online Video">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe width="auto" height="auto" src="{{$produk->produk_video_youtube}}" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-12 col-md-9 mt10 mb10">
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


                                    <div class="section-divider mb15"></div>


                                </div>
                                @if(Auth::check())
                                <div id="modal-panel" class="popup-basic bg-none admin-form mfp-hide mfp-with-anim">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title"><i class="fa fa-pencil"></i> Rate and Review</span>
                                        </div>
                                        <form action="{{URL::route('post-rate-review',$produk->id_produk)}}" method="post"  id="comment">
                                            <div class="panel-body p25">
                                                @if($user_review ==null)
                                                    <div class="section">
                                                        <div class="pn mn center-block">
                                                                <span class="rating block ">
                                                                <input class="rating-input" id="five-stars" type="radio" name="product_rate" value="5">
                                                                    <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="four-stars" type="radio" name="product_rate" value="4">
                                                                    <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="three-stars" type="radio" name="product_rate" value="3">
                                                                    <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="two-stars" type="radio" name="product_rate" value="2">
                                                                    <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="one-star" type="radio" name="product_rate" value="1">
                                                                    <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="section row">
                                                        <div class="col-md-12">
                                                                <label for="review_title" class="field prepend-icon">
                                                                    <input type="text" name="review_title" id="review_title" class="gui-input" placeholder="Title">
                                                                    <label for="review_title" class="field-icon"><i class="fa fa-comment"></i>
                                                                    </label>
                                                                </label>
                                                        </div>
                                                    </div>
                                                    <div class="section">
                                                            <label for="review" class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="review" name="review" placeholder="Your Review"></textarea>
                                                                <label for="review" class="field-icon"><i class="fa fa-comments"></i>
                                                                </label>
                                                                <span class="input-footer">
                                                                <strong>Hey You:</strong> We expect a great review...</span>
                                                            </label>
                                                    </div>
                                                @else
                                                    @foreach($user_review as $user_rate)
                                                        <div class="section">
                                                            <h5 class="media-heading">Your last rate : {{$user_rate->user_rate}} stars</h5>
                                                            <div class="pn mn center-block">
                                                                    <span class="rating block ">
                                                                    <input class="rating-input" id="five-stars" type="radio" name="product_rate" value="5">
                                                                        <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                    <input class="rating-input" id="four-stars" type="radio" name="product_rate" value="4">
                                                                        <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                    <input class="rating-input" id="three-stars" type="radio" name="product_rate" value="3">
                                                                        <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                    <input class="rating-input" id="two-stars" type="radio" name="product_rate" value="2">
                                                                        <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                    <input class="rating-input" id="one-star" type="radio" name="product_rate" value="1">
                                                                        <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="section row">
                                                            <div class="col-md-12">
                                                                <label for="review_title" class="field prepend-icon">
                                                                    <input type="text" name="review_title" id="review_title" class="gui-input" placeholder="Title" value="{{$user_rate->review_title}}">
                                                                    <label for="review_title" class="field-icon"><i class="fa fa-comment"></i>
                                                                    </label>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="section">
                                                            <label for="review" class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="review" name="review" placeholder="Your Review">{{$user_rate->review_post}}</textarea>
                                                                <label for="review" class="field-icon"><i class="fa fa-comments"></i>
                                                                </label>
                                                                    <span class="input-footer">
                                                                    <strong>Hey You:</strong> We expect a great review...</span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="panel-footer text-right">
                                                <button type="submit" class="button btn-primary ">Submit</button>
                                                {{ Form::token() }}
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row mt10">
                                <div class="col-sm-12 col-md-9 col-lg-9">

                                    <section class="pn animated fadeIn">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-sm-12 col-md-3 text-center">
                                                <h1 class="mtn">{{$produk->produk_rate_total}}</h1>
                                                <div class="pn mn center-block">
                                                    <span class="rating block text-center">
                                                        @foreach($produkdetail as $rating)
                                                            @if($rating->produk_rate_total == 5)
                                                                <input class="rating-input" id="five-stars" type="radio" name="product_rate" checked>
                                                                    <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="four-stars" type="radio" name="product_rate">
                                                                    <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="three-stars" type="radio" name="product_rate">
                                                                    <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="two-stars" type="radio" name="product_rate">
                                                                    <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="one-star" type="radio" name="product_rate">
                                                                    <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                            @elseif($rating->produk_rate_total >=4 && $rating->produk_rate_total <5)
                                                                <input class="rating-input" id="five-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="four-stars" type="radio" name="product_rate" checked>
                                                                <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="three-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="two-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="one-star" type="radio" name="product_rate">
                                                                <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                            @elseif($rating->produk_rate_total >=3 && $rating->produk_rate_total <4)
                                                                <input class="rating-input" id="five-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="four-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="three-stars" type="radio" name="product_rate" checked>
                                                                <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="two-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="one-star" type="radio" name="product_rate">
                                                                <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                            @elseif($rating->produk_rate_total >=2 && $rating->produk_rate_total <3)
                                                                <input class="rating-input" id="five-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="four-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="three-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="two-stars" type="radio" name="product_rate" checked>
                                                                <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="one-star" type="radio" name="product_rate">
                                                                <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                            @elseif($rating->produk_rate_total >=1 && $rating->produk_rate_total <2)
                                                                <input class="rating-input" id="five-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="four-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="three-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="two-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="one-star" type="radio" name="product_rate" checked>
                                                                <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                            @else
                                                                <input class="rating-input" id="five-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="five-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="four-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="four-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="three-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="three-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="two-stars" type="radio" name="product_rate">
                                                                <label class="rating-star" for="two-stars"><i class="fa fa-star"></i></label>
                                                                <input class="rating-input" id="one-star" type="radio" name="product_rate">
                                                                <label class="rating-star" for="one-star"><i class="fa fa-star"></i></label>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <h6><i class="fa fa-group"></i> {{$produk->user_rate_total}}</h6>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6 text-center">
                                                @if($total_rate_user !=0)
                                                    <div class="progress-bar-sm progress-bar-system " role="progressbar" aria-valuenow="{{$getstar5/$total_rate_user}}*100" aria-valuemin="0" aria-valuemax="{{$getstar5/$total_rate_user}}*100" style="width:{{{($getstar5/$total_rate_user)*100}}}%;">{{$getstar5}}</div>
                                                    <div class="progress-bar-sm progress-bar-success " role="progressbar" aria-valuenow="{{$getstar4/$total_rate_user}}*100" aria-valuemin="0" aria-valuemax="{{$getstar4/$total_rate_user}}*100" style="width:{{{($getstar4/$total_rate_user)*100}}}%;">{{$getstar4}}</div>
                                                    <div class="progress-bar-sm progress-bar-primary " role="progressbar" aria-valuenow="{{$getstar3/$total_rate_user}}*100" aria-valuemin="0" aria-valuemax="{{$getstar3/$total_rate_user}}*100" style="width:{{{($getstar3/$total_rate_user)*100}}}%;">{{$getstar3}}</div>
                                                    <div class="progress-bar-sm progress-bar-warning " role="progressbar" aria-valuenow="{{$getstar2/$total_rate_user}}*100" aria-valuemin="0" aria-valuemax="{{$getstar2/$total_rate_user}}*100" style="width:{{{($getstar2/$total_rate_user)*100}}}%;">{{$getstar2}}</div>
                                                    <div class="progress-bar-sm progress-bar-danger " role="progressbar" aria-valuenow="{{$getstar1/$total_rate_user}}*100" aria-valuemin="0" aria-valuemax="{{$getstar1/$total_rate_user}}*100" style="width:{{{($getstar1/$total_rate_user)*100}}}%;">{{$getstar1}}</div>
                                                @endif
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                @if(Auth::check())
                                                    <div class="col-md-12">
                                                        <a href="#modal-panel" class="modal-example-btn btn btn-lg btn-system mt10 center-block" style="min-width:100px;max-width:13px;"><i class="fa fa-pencil"></i> Rate</a>
                                                    </div>
                                                @endif


                                            </div>

                                        </div>
                                    </div>

                                    </section>
                                </div>
                            </div>



                            <div class="row mt15">
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 mt20">
                                    <div class="tab-block mb25">
                                        <ul class="nav nav-tabs tabs-border nav-justified">
                                            <li class="active">
                                                <a href="#tab15_1" data-toggle="tab"><i class="fa fa-file-text text-purple pr5"></i> Description</a>
                                            </li>
                                            <li>
                                                <a href="#tab15_3" data-toggle="tab"><i class="fa fa-archive text-purple pr5"></i> Product Version</a>
                                            </li>
                                            <li>
                                                <a href="#tab15_2" data-toggle="tab"><i class="fa fa-star text-purple pr5"></i> Rate and Review</a>
                                            </li>




                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab15_1" class="tab-pane active">
                                                <p>{{$produk->produk_desc}}</p>
                                            </div>
                                            <div id="tab15_2" class="tab-pane" style="max-height: 350px;">
                                                @foreach($ratereview as $detail)
                                                <div class="panel-body">
                                                    <div class="media">
                                                        <a class="media-left" href="#">
                                                            <img src="{{$detail->user_photo}}" alt="holder-img" width="60" height="60">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{$detail->name}} | <span class="text-warning"> {{$detail->user_rate}} stars </span> </h4>
                                                            <h5 class="media-heading">{{$detail->review_title}}</h5>
                                                            <small class="media-heading">
                                                                {{$detail->review_post}}
                                                            </small>
                                                        </div>
                                                        <div class="pn mn pull-right">
                                                            <h5 class="media-heading mb5">{{date("d F Y",strtotime($detail->updated_at))}}</h5>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="section-divider"></div>
                                                @endforeach

                                            </div>

                                            <div id="tab15_3" class="tab-pane">
                                                <div class="panel-body">
                                                    @foreach($histories as $history)
                                                        <div class="media">
                                                            <a class="media-left" href="#">
                                                                <img src="{{$history->user_photo}}" alt="{{$history->name}}" width="100" height="100" >
                                                            </a>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">{{$history->name}}</h4>
                                                                <h5 class="media-heading">{{$history->produk_title}} - Version {{$history->produk_version}}</h5>
                                                                @if($history->reversioning_by !=0)
                                                                    @foreach($userhistory as $reversioner)
                                                                        <h5 class="media-heading">Reversioning by  {{$reversioner->reversionoffer}}</h5>
                                                                    @endforeach
                                                                @endif
                                                                <h5 class="media-heading">Updated at {{date("d F Y",strtotime($history->updated_at))}}</h5>
                                                            </div>
                                                        </div>
                                                        <hr class="short br-lighter">
                                                    @endforeach
                                                    <a href="{{URL::route('product-list-history',$produk->id_produk)}}" class="btn btn-default center-block" target="_blank">Show More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 mt20">
                                    <div id="disqus_thread"></div>
                                    <script type="text/javascript">
                                        /* * * CONFIGURATION VARIABLES * * */
                                        var disqus_shortname = 'telusdev';

                                        /* * * DON'T EDIT BELOW THIS LINE * * */
                                        (function() {
                                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                                </div>

                            </div>
                        </div>
                @endforeach



            </div>

            </div>
        </div>
    </div>

</section>

{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}

{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}

{{HTML::script('templates/theme/vendor/plugins/magnific/jquery.magnific-popup.js')}}
{{HTML::script('templates/theme/vendor/plugins/slick/slick.js')}}

{{HTML::script('templates/theme/assets/js/bootstrap/holder.min.js')}}

{{HTML::script('templates/theme/assets/admin-tools/admin-forms/js/jquery-ui-monthpicker.min.js')}}
{{HTML::script('templates/theme/assets/admin-tools/admin-forms/js/jquery-ui-timepicker.min.js')}}
{{HTML::script('templates/theme/assets/admin-tools/admin-forms/js/jquery-ui-touch-punch.min.js')}}
{{HTML::script('templates/theme/assets/admin-tools/admin-forms/js/jquery.spectrum.min.js')}}
{{HTML::script('templates/theme/assets/admin-tools/admin-forms/js/jquery.stepper.min.js')}}


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

        $('#stepper, #stepper9').stepper();

        function stepCallback( val, up )
        {
                var out = $('#out').html();
                out += '<li><strong>Target:</strong> #'+this.attr('id')+' | <strong>Val:</strong> '+val+' | <strong>Up:</strong> '+(up ? 'true' : 'false')+'</li>';
                $('#out').html( out );
        }

        var ajaxmodal = $('#ajax-content');
     /* ajaxmodal.on('click', '.holder-style', function(e){
            $.post();
        ajaxmodal.find('.holder-style').removeClass('holder-active');
            $(this).addClass('holder-active');
        })*/

        $('#button2').click(function(){
            $.ajax({
                type: "POST",
                url : "{{URL::route('products-product-cart')}}",
                data: "57",
                success : function(
                    ajaxmodal.find('.holder-style').removeClass('holder-active');
                    $(this).addClass('holder-active');

                )
            });
        });

        var modalContent = $('#modal-content');

        modalContent.on('click', '.holder-style', function(e) {
            $.post("");

        modalContent.find('.holder-style').removeClass('holder-active');
            $(this).addClass('holder-active');
        });

        $( "#spinner" ).spinner();

        $('.center-mode').slick({
            dots: true,
            centerMode: true,
            centerPadding: '120px',
            slidesToShow: 3,
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }]
        });

        // Init modal gallery on parent wrapper of image group
        $('.popup-gallery').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image', // declare item type
            gallery: { // declare group an image gallery and set options
                enabled: true,
                tPrev: 'Previous (Left Arrow Key)', // left cycle arrow
                tNext: 'Next (Right Arrow Key)', // right cycle arrow
                tCounter: '' // display group item counter
            }
        });
        $('.expanding-bars-pane .progress-bar').each(function(i, element) {
            var pbarWidth = i + 1;
            $(this).animate({
                width: (pbarWidth * 25) + '%'
            });
        });
        $('.modal-example-btn').magnificPopup({
            type:'inline', // declare type of popup data
            callbacks: {
                // If an animation is desired we create a callback that
                // applies the animation class to the modal parent
                beforeOpen: function(e) {
                    var Animation = 'mfp-flipInY'; // animation desired
                    this.st.mainClass = Animation; // apply to modal parent
                }
            },
            removalDelay: 500, //delay modals removal so animation has time to play
        });


    });
</script>

{{--
    Ini setingan fancybox-nya.. kalau mau lengkap liat di documentasinya aja yan
--}}

{{HTML::script('fancybox/lib/jquery.mousewheel-3.0.6.pack.js')}}
{{HTML::script('fancybox/source/jquery.fancybox.pack.js?v=2.1.5')}}
{{HTML::script('fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}
{{HTML::script('fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6')}}
{{HTML::script('fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7')}}

<script type="text/javascript">
    $(document).ready(function() {
        $(".various").fancybox({
            maxWidth	: 800,
            maxHeight	: 600,
            fitToView	: false,
            width		: '70%',
            height		: '70%',
            autoSize	: false,
            closeClick	: false,
            openEffect	: 'none',
            closeEffect	: 'none'
        });
    });
</script>

</body>