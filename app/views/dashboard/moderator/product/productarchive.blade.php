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
    @include('dashboard.admin_moderator_header')
    @include('dashboard.moderator.menu_moderator')


    <section id="content_wrapper">


        <!-- Start: Topbar -->
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="#">Product Archive</a>
                    </li>
                    <li class="crumb-trail">Dashboard</li>
                    <li class="crumb-trail">Manage Product</li>
                    <li class="crumb-trail">Product List</li>
                    <li class="crumb-trail">Product Archive</li>
                </ol>
            </div>

        </header>

        <section id="content" class="table-layout animated fadeIn">

            <div class="tray tray-center p10 va-t posr">
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

                @if(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check pr10"></i>
                        <strong>{{ Session::get('failed') }}!</strong>
                    </div>

                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-visible table-responsive" id="spy2">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="fa fa-book"></span>Product List</div>
                            </div>
                            <div class="panel-body pn">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="media ml20 mt20 mb20">
                                            @foreach($productshow as $currentitems)
                                                <a class="media-left " href="#">
                                                    <img src="{{$currentitems->produk_ava}}" src="" alt="" width="150" height="150">
                                                </a>

                                                <div class="media-body">
                                                    <h3 class="media-heading">{{$currentitems->produk_title}}</h3>
                                                    <h5 class="media-heading">
                                                        {{$currentitems->name}} | <span class="text-system">{{$currentitems->produk_type}}</span>

                                                            | <span class="text-primary">Open Innovation</span>

                                                    </h5>
                                                    <h6 class="media-heading">{{$currentitems->produk_downloaded }} Downloaded</h6>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="datatable2" >
                                        <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Version</th>
                                            <th class="text-center">Updated</th>
                                            <th class="text-center">Show</th>
                                            <th class="text-center">Current Using</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php $i=1; ?>
                                        @foreach($histories as $history)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$history->produk_version}}</td>
                                            <td>{{$history->updated_at}}</td>
                                            <td>
                                                @if($history->available ==1)
                                                    <span class="label label-system">Yes</span>
                                                @else
                                                    <span class="label label-danger">No</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($history->produk_main ==1)
                                                    <span class="label label-system">Main</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">

                                                    @if($history->available ==0)
                                                        <a href="{{URL::route('dashboard-moderator-manageproduct-visible',$history->id_produk_detail)}}" onclick="return confirm('Are you sure set this visible ?')"  class="btn btn-system" title="Visible"><i class="fa fa-eye"></i></a>
                                                    @else
                                                        <a href="{{URL::route('dashboard-moderator-manageproduct-invisible',$history->id_produk_detail)}}" onclick="return confirm('Are you sure set this not-visible ?')"  class="btn btn-default" title="Not-Visible"><i class="fa fa-eye"></i></a>
                                                    @endif
                                                    <a href="{{URL::route('dashboard-moderator-manageproduct-product-archive-showdetail',$history->id_produk_detail)}}" class="btn btn-info" title="Product History"><i class="fa fa-archive"></i></a>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++;?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class=" pull-right mb10 mt10 mr10">
                                    <a href="{{URL::route('dashboard-moderator-manageproduct-product-list')}}" class="btn btn-system"><i class="fa fa-arrow-left"></i> Back</a>
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
{{HTML::script('templates/theme/vendor/plugins/magnific/jquery.magnific-popup.js')}}
{{HTML::script('templates/theme/vendor/plugins/datatables/media/js/jquery.dataTables.js')}}
{{HTML::script('templates/theme/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}
{{HTML::script('templates/theme/vendor/plugins/datatables/extensions/Editor/js/dataTables.editor.js')}}
{{HTML::script('templates/theme/vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}
{{HTML::script('templates/theme/vendor/plugins/datatables/extensions/Editor/js/editor.bootstrap.js')}}

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

        // Init tray navigation smooth scroll
        $('.tray-nav a').smoothScroll({
            offset: -145
        });
        // Custom tray navigation animation
        setTimeout(function() {
            $('.custom-nav-animation li').each(function(i, e) {
                var This = $(this);
                var timer = setTimeout(function() {
                    This.addClass('animated zoomIn');
                }, 100 * i);
            });
        }, 600);
        // Init Datatables with Tabletools Addon
        $('#datatable2').dataTable({
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "iDisplayLength": 5,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            }
        });


        // Add Placeholder text to datatables filter bar
        $('.dataTables_filter input').attr("placeholder", "Search...");

    });
</script>


</body>