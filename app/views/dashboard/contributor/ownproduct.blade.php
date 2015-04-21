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
                        <a href="#">Own Product</a>
                    </li>
                    <li class="crumb-link">
                        <a href="#">Home Page</a>
                    </li>
                    <li class="crumb-trail">TEL_US Content</li>
                    <li class="crumb-trail">Own Product</li>
                </ol>
            </div>

        </header>

        <section id="content" class="table-layout animated fadeIn">

            <div class="tray tray-center p10 va-t posr">
                <div class="pull-right mb5 mt5">
                    <a href="#modal-panel" class="modal-example-btn btn btn-lg btn-system"><i class="fa fa-plus"></i> Add Product </a>
                </div>

                <div id="modal-panel" class=" popup-basic admin-form mfp-with-anim mfp-hide">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-plus"></i>Add Product</span>
                        </div>

                            <div class="panel-body p25">
                                <div class="section row">
                                    <div class="col-md-12">
                                        <a href="{{URL::route('dashboard-contributor-manageproduct-addfreemium')}}" class="btn btn-lg btn-system center-block"><i class="fa fa-upload"></i> Freemium Product</a>
                                        <div class="section-divider mt20 mb20">
                                            <span>OR</span>
                                        </div>
                                        <a href="{{URL::route('dashboard-contributor-manageproduct-addpremium')}}" class="btn btn-lg btn-system center-block"><i class="fa fa-upload"></i> Premium Product</a>
                                    </div>
                                </div>

                            </div>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-visible table-responsive" id="spy2">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="fa fa-check-circle"></span>Own Product</div>
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
                                            <th class="text-center">Downloaded</th>
                                            <th class="text-center">Initiate Date</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php $i=1; ?>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{$product->produk_title}}</td>
                                            <td>{{$product->produk_version}}</td>
                                            <td>{{$product->produk_type}}</td>
                                            <td>{{$product->produk_downloaded}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#modal-editadmin" class="modal-example-btn btn btn-system"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-warning"><i class="fa fa-ban"></i></a>
                                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

                <div id="modal-editadmin" class=" popup-basic admin-form mfp-with-anim mfp-hide">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-edit"></i>Edit Administrator</span>
                        </div>
                        <!-- end .panel-heading section -->

                        <form method="post" action="/" id="comment">
                            <div class="panel-body p25">
                                <div class="section row">
                                    <div class="col-md-6">
                                        <label for="firstname" class="field prepend-icon">
                                            <input type="text" name="firstname" id="firstname" class="gui-input" placeholder="First name...">
                                            <label for="firstname" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="lastname" class="field prepend-icon">
                                            <input type="text" name="lastname" id="lastname" class="gui-input" placeholder="Last name...">
                                            <label for="lastname" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>

                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ">
                                        <label for="username" class="field prepend-icon">
                                            <input type="text" name="username" id="username" class="gui-input" placeholder="Username">
                                            <label for="Title" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ">
                                        <label for="email" class="field prepend-icon">
                                            <input type="text" name="email" id="email" class="gui-input" placeholder="Email">
                                            <label for="Title" class="field-icon"><i class="fa fa-envelope"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ">
                                        <label for="password" class="field prepend-icon">
                                            <input type="password" name="password" id="password" class="gui-input" placeholder="Password">
                                            <label for="Title" class="field-icon"><i class="fa fa-key"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ">
                                        <label for="retypepassword" class="field prepend-icon">
                                            <input type="text" name="retypepassword" id="retypepassword" class="gui-input" placeholder="Re-type Password">
                                            <label for="Title" class="field-icon"><i class="fa fa-key"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>





                            </div>
                            <div class="panel-footer text-right">
                                <button type="submit" class="button btn-primary">Submit</button>
                            </div>
                        </form>
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