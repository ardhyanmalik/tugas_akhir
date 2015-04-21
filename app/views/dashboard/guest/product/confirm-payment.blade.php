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
                <div class="col-md-8">
                    <div class="section-divider mt10 mb40 mr25">
                    <span>Confirm Payment</span>
                    </div>
                    <form class="form-horizontal" role="form">
                        <strong><p>Pilih Bank yang Digunakan</p></strong>
                        <div class="form-group">
                            <div class="col-lg-6">
                                <label for="product-category" class="field select">
                                    <select id="bank" name="bank">
                                        <option value="0" selected="selected">Pilih Bank</option>
                                        <option value="1">BNI</option>
                                        <option value="2">Mandiri</option>
                                        <option value="3">BCA</option>
                                    </select>
                                <i class="arrow double"></i>
                                </label>
                            </div>
                        </div>
                        <strong><p>Nama Pengirim</p></strong>
                        <div class="form-group">
                            <div class="col-lg-6">
                            <input type="text" id="inputStandard" class="form-control" placeholder="Masukkan Nama Pengirim">
                            </div>
                        </div>
                        <strong><p>Nomor Rekening</p></strong>
                        <div class="form-group">
                            <div class="col-lg-6">
                            <input type="text" id="inputStandard" class="form-control" placeholder="Masukkan Nomor Rekening">
                            </div>
                        </div>
                        <strong><p>Bukti Transaksi</p></strong>
                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="field prepend-icon file">
                                    <span class="button">Choose File</span>
                                        <input type="file" class="gui-file" name="file2" id="file2" onchange="document.getElementById('uploader2').value = this.value;">
                                        <input type="text" class="gui-input" id="uploader2" placeholder="Please Select A File">
                                    <label class="field-icon"><i class="fa fa-upload"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        </br>
                        <div class="section-divider mt10 mb40 mr25">
                        </div>
                        <div class="col-lg-8">
                            <div class="col-lg-7">
                                <button type="button" class="btn btn-success btn-block">Submit</button>
                                </br>
                                <p>Anda akan menerima konfirmasi order melalui email dan sms.</p>
                            </div>
                        </div>
                       
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="section-divider mt10 mb40 mr25">
                    <span>Rekening Bank</span>
                    </div>
                    <div class="panel">
                            <div class="panel-heading">
                                <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                                    <li class="active">
                                        <a href="#tab2_1" data-toggle="tab">Mandiri</a>
                                    </li>
                                    <li>
                                        <a href="#tab2_2" data-toggle="tab">BNI</a>
                                    </li>
                                    <li>
                                        <a href="#tab2_3" data-toggle="tab">BCA</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
                                    <div id="tab2_1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="assets/img/stock/1.jpg" class="img-responsive thumbnail mr25">
                                            </div>
                                            <div class="col-md-8">
                                                <p>BNI Dayeuhkolot</p>
                                                <p>Telkom University</p>
                                                <p>025-026-362</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab2_2" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="assets/img/stock/1.jpg" class="img-responsive thumbnail mr25">
                                            </div>
                                            <div class="col-md-8">
                                                <p>BNI Dayeuhkolot</p>
                                                <p>Telkom University</p>
                                                <p>025-026-362</p>
                                        </div>
                                    </div>
                                    <div id="tab2_3" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="assets/img/stock/1.jpg" class="img-responsive thumbnail mr25">
                                            </div>
                                            <div class="col-md-8">
                                                <p>BNI Dayeuhkolot</p>
                                                <p>Telkom University</p>
                                                <p>025-026-362</p>
                                        </div>
                                    </div>
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