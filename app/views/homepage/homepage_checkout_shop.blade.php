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
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 mt10 mb20">
                    <section id="content" class="">

                <div class="panel invoice-panel">
                    <div class="panel-heading">
                        <span class="panel-title">
                            <span class="glyphicon glyphicon-print"></span>Detail Order</span>
                    </div>
                    <div class="panel-body p20" id="invoice-item">

                        <div class="row mb30">
                            <div class="col-md-4">
                                <div class="pull-left">
                                    <h4 class="mn"> Status: <b class="text-warning"></b> </h4>
                                    <h4 class="mn"> Invoice # : </h4>
                                    <h4 class="mn"> Invoice Date :  </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="invoice-table">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th style="width: 135px;">Number of Items</th>
                                            <th>Price</th>
                                            <th class="text-right pr10">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>3</b>
                                            </td>
                                            <td>Net Code Revamp</td>
                                            <td>Worked on Design and Structure (per hour)</td>
                                            <td>16</td>
                                            <td>$35.00</td>
                                            <td class="text-right pr10">$560.00</td>
                                        </tr>
                                        <tr>
                                            <td><b>1</b>
                                            </td>
                                            <td>Developer Newsletter </td>
                                            <td>Year Subscription X2</td>
                                            <td>2</td>
                                            <td>$12.99</td>
                                            <td class="text-right pr10">$25.98</td>
                                        </tr>
                                        <tr>
                                            <td><b>3</b>
                                            </td>
                                            <td>Admin Dashboard</td>
                                            <td>Design and implemention(per hour)</td>
                                            <td>16</td>
                                            <td>$35.00</td>
                                            <td class="text-right pr10">$560.00</td>
                                        </tr>
                                        <tr>
                                            <td><b>3</b>
                                            </td>
                                            <td>Web Development</td>
                                            <td>Worked on Design and Structure (per hour)</td>
                                            <td>23</td>
                                            <td>$30.00</td>
                                            <td class="text-right pr10">$690.00</td>
                                        </tr>
                                        <tr>
                                            <td><b>1</b>
                                            </td>
                                            <td>Developer Newsletter </td>
                                            <td>Year Subscription X2</td>
                                            <td>2</td>
                                            <td>$12.99</td>
                                            <td class="text-right pr10">$25.98</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" id="invoice-footer">
                            <div class="col-md-12">
                                <div class="pull-left mt20 fs15 text-primary"> Thank you for your business.</div>
                                <div class="pull-right">
                                    <table class="table" id="invoice-summary">
                                        <thead>
                                            <tr>
                                                <th><b>Sub Total:</b>
                                                </th>
                                                <th>$1375.98</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Total</b>
                                                </td>
                                                <td>$230.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="clearfix"></div>
                                <div class="invoice-buttons">
                                    <a href="javascript:window.print()" class="btn btn-default mr10"><i class="fa fa-print pr5"></i> Print Invoice</a>
                                    <button class="btn btn-primary btn-gradient" type="button"><i class="fa fa-floppy-o pr5"></i> Save Invoice</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
            <!-- End: Content -->
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