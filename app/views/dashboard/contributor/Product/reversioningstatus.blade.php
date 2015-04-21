<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/vendor/plugins/magnific/magnific-popup.css')}}
    {{HTML::style('templates/theme/vendor/plugins/datatables/media/css/dataTables.bootstrap.css')}}
    {{HTML::style('templates/theme/vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-plugins/admin-modal/adminmodal.css')}}


</head>
<body class="blank-page">

<!-- Start: Main -->
<div id="main">
    @include('dashboard.contributor_header')
    @include('dashboard.contributor.menu_contributor')


    <section id="content_wrapper">


        <!-- Start: Topbar -->
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="#">Reversioning Approval</a>
                    </li>
                    <li class="crumb-trail">Dashboard</li>
                    <li class="crumb-trail">Manage Product</li>
                    <li class="crumb-trail">Reversioning Approval</li>
                </ol>
            </div>

        </header>

        <section id="content" class="table-layout animated fadeIn">

            <div class="tray tray-center p10 va-t posr">
                <div class="mb15">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-visible table-responsive" id="spy2">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="fa fa-exclamation-circle"></span>Reversioning Approval</div>
                            </div>
                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="datatable2" >
                                        <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Version</th>
                                            <th class="text-center">Type Product</th>
                                            <th class="text-center">Submited by</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php $i=1; ?>
                                        @foreach($reversioning as $data)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$data->produk_title}}</td>
                                                <td>{{$data->produk_version}}</td>
                                                <td>{{$data->produk_type}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->updated_at}}</td>
                                                <td>
                                                    <?php
                                                    if($data->reversioning_produk_status==2){
                                                        echo "<span class='label label-warning'>Waiting Contributor</span>";
                                                    }else{
                                                        echo "<span class='label label-system'>Waiting Moderator</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        @if($data->reversioning_produk_status==2)
                                                            <a href="{{URL::route('dashboard-contributor-manageproduct-reversioning-approve',$data->id_reversioning)}}" onclick="return confirm('Are you sure approve this reversioning?')" class="btn btn-system" title="Approve"><i class="fa fa-check-circle"></i></a>
                                                            <a href="{{URL::route('dashboard-contributor-manageproduct-reversioning-deny',$data->id_reversioning)}}" onclick="return confirm('Are you sure deny this reversioning?')" class="btn btn-danger" title="Deny"><i class="fa fa-ban"></i></a>
                                                            <a href="{{URL::route('dashboard-contributor-manageproduct-reversioning-details',$data->id_reversioning)}}" class="btn btn-info" title="Details"><i class="fa fa-info-circle"></i></a>
                                                        @endif
                                                    </div>
                                                </td>
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


    </section>




</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

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