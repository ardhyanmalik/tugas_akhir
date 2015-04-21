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
<body class="blank-page">

<div id="main">
    @include('dashboard.admin_moderator_header')
    @include('dashboard.moderator.menu_moderator')


    <section id="content_wrapper">
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="#">Product Details</a>
                    </li>
                    <li class="crumb-trail">Manage Product</li>
                    <li class="crumb-trail">Need Approval</li>
                    <li class="crumb-trail">Product Details</li>
                </ol>
            </div>

        </header>

        <section id="content" class="table-layout animated fadeIn">
            <aside class="tray tray-right w320 va-t" data-tray-height="match">

                <h4 class="ph10 mt10 mb15"> Product Picture </h4>
                <hr class="mn br-light">
                <div class="fileupload fileupload-new admin-form mt20" data-provides="fileupload">
                        @foreach($product as $productava)
                        <div class="fileupload-preview thumbnail m5 mt20 mb30">
                            <img src="{{ $productava->produk_ava}}"  alt="{{ $productava->produk_title}}">
                        </div>
                        @endforeach
                </div>
            </aside>


            <div class="tray tray-center pv5 ph5 va-t posr animated-delay animated-long" data-animate='["800","fadeIn"]'>
                <div class="mw1100 center-block">
                    <div class="admin-form">
                        <div id="p1" class="panel heading-border">
                            <div class="panel-body bg-light">
                                    <div class="section-divider mb40" id="spy1">
                                        <span>Account Information</span>
                                    </div>

                                    <div class="row">
                                            <div class="form-horizontal" role="form">
                                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                                    <div class="section">
                                                        @foreach($contributor as $contributor_user)
                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">NIK/NIM</label>
                                                                <div class="col-sm-12 col-md-8 col-lg-8 input-group">
                                                                <span class="input-group-addon"><i class="fa fa-font"></i>
                                                                </span>
                                                                    <input name="name" class="form-control" type="text"  value="{{$contributor_user->id_contributor}}"placeholder="Full Name" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Full Name</label>
                                                                <div class="col-sm-12 col-md-8 col-lg-8 input-group">
                                                                <span class="input-group-addon"><i class="fa fa-font"></i>
                                                                </span>
                                                                    <input name="name" class="form-control" type="text"  value="{{$contributor_user->name}}"placeholder="Full Name" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-12 col-md-4 col-lg-4 control-label text-right">Email</label>
                                                                <div class="col-xs-12 col-sm-12 col-md-8 input-group">
                                                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i>
                                                                </span>
                                                                    <input name="email" class="form-control" type="text" value="{{$contributor_user->email}}"placeholder="Email" readonly>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="section-divider mb40" id="spy1">
                                        <span>Product's Info</span>
                                    </div>

                                    <div class="row">
                                        @foreach($product as $items)
                                            <div class="form-horizontal" role="form">
                                                    <div class="col-md-10 ">
                                                        <div class="section">

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-right">Product's Title</label>
                                                                <div class="col-md-8 input-group">
                                                                <span class="input-group-addon"><i class="fa fa-font"></i>
                                                                </span>
                                                                    <input class="form-control" type="text" placeholder="Product's Title"  value="{{$items->produk_title}}"readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-right">Product's Category</label>
                                                                <div class="col-md-8 input-group">
                                                                <span class="input-group-addon"><i class="fa fa-tags"></i>
                                                                </span>
                                                                    <input class="form-control" type="text" placeholder="Product's Category" value="{{$items->category_name}}"readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-right">Product's Type</label>
                                                                <div class="col-md-8 input-group">
                                                                <span class="input-group-addon"><i class="fa fa-tag"></i>
                                                                </span>
                                                                    <input class="form-control" type="text" placeholder="Product's Type" value="{{$items->produk_type}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-right">Youtube Link</label>
                                                                <div class="col-md-8 input-group">
                                                                <span class="input-group-addon"><i class="fa fa-youtube-play"></i>
                                                                </span>
                                                                    <input class="form-control" type="text" placeholder="Youtube Link" value="{{$items->produk_video_youtube}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-right">Product's Introduction</label>
                                                                <div class="col-md-8 input-group">
                                                                    <div class="section">
                                                                            <textarea name="ckeditor2" id="ckeditor2" name="ckeditor2" rows="12">
                                                                                {{$items->produk_introduction}}
                                                                            </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-right">Product's Description</label>
                                                                <div class="col-md-8 input-group">
                                                                    <div class="section">
                                                                            <textarea name="ckeditor1" id="ckeditor1" name="ckeditor1" rows="12">
                                                                               {{$items->produk_desc}}
                                                                            </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>


                                            <section id="content" class="pn animated fadeIn ">
                                                <div class="col-xs-12 col-sm-12  col-md-12 center-block demo-block">
                                                    <div class="row table-layout center-block ">
                                                        <div class="slider-demo7 col-xs-12 col-sm-12 col-md-8">
                                                            <div class="center-mode">
                                                                @foreach($product as $productimage)
                                                                    <div class="slick-slide">
                                                                        <div class="media popup-gallery center-block">
                                                                            <a class="media-left" href="{{$productimage->produk_pict_1}}" title="{{$productimage->produk_title}}">
                                                                                <img src="{{$productimage->produk_pict_1}}" width="100" height="100">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="slick-slide">
                                                                        <div class="media popup-gallery center-block">
                                                                            <a class="media-left" href="{{$productimage->produk_pict_2}}" title="{{$productimage->produk_title}}">
                                                                                <img src="{{$productimage->produk_pict_2}}" width="100" height="100">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    @if($productimage->produk_pict_3 !=null)
                                                                    <div class="slick-slide ">
                                                                        <div class="media popup-gallery center-block">
                                                                            <a class="media-left" href="{{$productimage->produk_pict_3}}" title="{{$productimage->produk_title}}">
                                                                                <img src="{{$productimage->produk_pict_3}}" width="100" height="100">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if($productimage->produk_pict_4 !=null)
                                                                    <div class="slick-slide ">
                                                                        <div class="media popup-gallery center-block">
                                                                            <a class="media-left" href="{{$productimage->produk_pict_4}}" title="{{$productimage->produk_title}}">
                                                                                <img src="{{$productimage->produk_pict_4}}" width="100" height="100">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if($productimage->produk_pict_5 !=null)
                                                                    <div class="slick-slide ">
                                                                        <div class="media popup-gallery center-block">
                                                                            <a class="media-left" href="{{$productimage->produk_pict_5}}" title="{{$productimage->produk_title}}">
                                                                                <img src="{{$productimage->produk_pict_5}}" width="100" height="100">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    @endif

                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                        @endforeach
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
{{HTML::script('templates/theme/vendor/editors/ckeditor/ckeditor.js')}}
{{HTML::script('templates/theme/vendor/plugins/magnific/jquery.magnific-popup.js')}}
{{HTML::script('templates/theme/vendor/plugins/slick/slick.js')}}

{{HTML::script('templates/theme/vendor/plugins/fileupload/fileupload.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/holder.min.js')}}
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
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.replace('ckeditor1', {
            height: 210,
            on: {
                instanceReady: function(evt) {
                    $('.cke').addClass('admin-skin cke-hide-bottom');
                }
            }
        });
        CKEDITOR.replace('ckeditor2', {
            height: 210,
            on: {
                instanceReady: function(evt) {
                    $('.cke').addClass('admin-skin cke-hide-bottom');
                }
            }
        });
        $('.center-mode').slick({
            dots: true,
            centerMode: true,
            centerPadding: '60px',
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

    });


</script>


</body>