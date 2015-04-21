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
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Product Tittle</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i= 1;?>
                    @foreach($cart_content as $cart)
                        <tr>
                            <th>{{ $i }}</th>
                            <th>{{ $cart-> name}}</th>
                            <th>{{ $cart-> price}}</th>
                            <th>{{ $cart-> qty }}</th>
                        </tr>
                    <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
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