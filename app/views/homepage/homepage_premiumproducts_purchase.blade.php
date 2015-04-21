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
                    <li class="#">Product Details</li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="admin-form">

                @foreach($produk as $produks)
                <div class="col-md-7">
                    <div class="section-divider mt10 mb40 mr25">
                    <span>Ordering Product</span>
                    </div>
                    <div class="form-group">
                        <a class="media-left" href="#">
                                    <img src="{{$produks->produk_ava}}" alt="{{$produks->produk_title}}" width="250" height="250">
                                </a>
                    </div>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="disabledInput" class="col-lg-3">Product Title</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="disabledInput" type="text" placeholder="{{$produks->produk_title}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput" class="col-lg-3">Category</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="disabledInput" type="text" placeholder="{{$produks->id_category}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="spinner1" class="col-lg-3">Quantity</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="qty" id="qty" class="form-control ui-spinner-input"  value="1" />
                                </div>
                            </div>
                       </div>
                        <div class="form-group">
                            <label class="col-lg-3">Price</label>
                            <h2 class="text-center">Rp. 256.000</h2>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-8">
                                <a href="{{URL::route('products-product-cart',$produks->id_produk)}}" class="btn btn-system dark"><i class="fa fa-shopping-cart"> Add to Chart</i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach

                <div class="col-md-5">
                    <div class="panel panel-success heading-border">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-shopping-cart"></i> Your Shopping</span>
                        </div>
                        <div>
                            <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>SubTotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;?>
                        @foreach($cart_content as $cart)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $cart-> name }}</td>
                                <td>{{ $cart-> qty }}</td>
                                <td>{{ $cart-> price }}</td>
                                <td>{{ $cart->price* $cart->qty }}
                                <td><a href="{{ URL::route('productcart-delete',$cart->rowid)}}" class="btn btn-system dark"><i class="fa fa-shopping-cart"> Delete</i></a></td>
                            </tr>
                        <?php $i++;?>
                        @endforeach
                        </tbody>
                    </table>
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

        // Init jQuery spinner init - default
        $("#qty").spinner();

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


</body>