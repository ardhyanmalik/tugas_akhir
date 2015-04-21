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
                <div class="col-md-7">
                    <div class="panel panel-success heading-border">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-shopping-cart"></i> Checkout</span>
                        </div>

                        <form method="post">
                            <div class="panel-body p25">
                                <div class="section-divider">
                                    <span>Personal Information</span>
                                </div>

                                <div class="section">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="name" id="name" class="gui-input" placeholder="Your Name...">
                                        <label for="name" class="field-icon"><i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label for="email" class="field prepend-icon">
                                        <input type="email" name="email" id="email" class="gui-input" placeholder="Email address">
                                        <label for="email" class="field-icon"><i class="fa fa-envelope"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label for="mobile" class="field prepend-icon">
                                        <input type="tel" name="mobile" id="mobile" class="gui-input" placeholder="Telephone / moble number">
                                        <label for="mobile" class="field-icon"><i class="fa fa-phone-square"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section-divider mv40">
                                    <span>Shipping Address</span>
                                </div>
                                <div class="section">
                                    <label for="lastaddr" class="field prepend-icon">
                                        <input type="text" name="lastaddr" id="lastaddr" class="gui-input" placeholder="Street address">
                                        <label for="lastaddr" class="field-icon"><i class="fa fa-map-marker"></i>
                                        </label>
                                </div>
                                <div class="section">
                                    <label class="field select">
                                        <select id="province" name="province">
                                            <option value="">Select Province</option>
                                            <option value="Jawa Barat">Jawa Barat</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="section row">
                                    <div class="col-md-6">
                                        <label for="zip" class="field prepend-icon">
                                            <input type="text" name="city" id="city" class="gui-input" placeholder="City">
                                            <label for="zip" class="field-icon"><i class="a fa-building-o"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="zip" class="field prepend-icon">
                                            <input type="text" name="zip" id="zip" class="gui-input" placeholder="Zip">
                                            <label for="zip" class="field-icon"><i class="fa fa-certificate"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <a href="#" class="btn btn-danger dark"><i class="fa fa-shopping-cart"> Back to Shopping</i>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{URL::route('products-premium-products-checkout')}}" class="btn btn-system dark"><i class="fa fa-shopping-cart"> Checkout</i>

                                        
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        $("#spinner1").spinner();

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