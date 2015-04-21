<!DOCTYPE html>
<html>

<head>

    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}
    {{HTML::style('templates/theme/vendor/editors/summernote/summernote.cs')}}
    {{HTML::style('templates/theme/vendor/plugins/magnific/magnific-popup.css')}}
    {{HTML::style('templates/theme/vendor/plugins/datatables/media/css/dataTables.bootstrap.css')}}
    {{HTML::style('templates/theme/vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-plugins/admin-modal/adminmodal.css')}}
</head>

<body class="blank-page">

    <!-- Start: Main -->
    <div id="main">
        @include('dashboard.admin_moderator_header')
        @include('dashboard.moderator.menu_moderator')

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">


            <!-- Start: Topbar -->
            <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="dashboard.html">TEL_US Content</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="dashboard.html">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-trail">Manage Product</li>
                    <li class="crumb-trail">Product List</li>
                </ol>
            </div>

            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">
            <div class="tray tray-center p25 va-t posr">
                    <!-- recent orders table -->

                <div class="row">

                        <div class="col-md-12">
                            <div class="panel panel-visible table-responsive" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        <span class="glyphicon glyphicon-user"></span>Product List</div>
                                </div>
                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="datatable2" >
                                            <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Product Title</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Category</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Contributor</th>
                                                <th class="text-center">Status</th>

                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <td>Product 1</td>
                                                <td>User's Username</td>
                                                <td>Software</td>
                                                <td>65.000</td>
                                                <td>User 1</td>
                                                <td class="">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-system br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li class="active"></li>
                                                        <li>
                                                            <a href="#">Active</a>
                                                        </li>
                                                        <li class="#">
                                                            <a href="#">Pending</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Canceled</a>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product 2</td>
                                                <td>User's Username</td>
                                                <td>Hardware</td>
                                                <td>Freemium</td>
                                                <td>User 2</td>
                                                <td class="">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Banned
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li class="active"></li>
                                                        <li>
                                                            <a href="#">Active</a>
                                                        </li>
                                                        <li class="#">
                                                            <a href="#">Banned</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Hapus</a>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- end: .tray-center -->
            
            </section>
            <!-- End: Content -->

        </section>
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->


    <style>
        #message-table > tbody > tr.highlight > td {
            background-color: #FFFEF0;
        }
    </style>
    
    <!-- jQuery -->

    {{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
    {{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
    {{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}
    {{HTML::script('templates/theme/vendor/plugins/fileupload/fileupload.js')}}
    {{HTML::script('templates/theme/assets/js/bootstrap/holder.min.js')}}
    {{HTML::script('templates/theme/vendor/plugins/tagsinput/tagsinput.min.js')}}
    {{HTML::script('templates/theme/assets/js/utility/utility.js')}}
    {{HTML::script('templates/theme/assets/js/main.js')}}
    {{HTML::script('templates/theme/assets/js/demo.js')}}
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

            // grant file-upload preview onclick functionality
            $('.fileupload-preview').on('click', function() {
                $('.btn-file > input').click();
            });

            // select dropdowns - placeholder like creation
            var selectList = $('.admin-form select');
            selectList.each(function(i, e) {
                $(e).on('change', function() {
                    if ($(e).val() == "0") $(e).addClass("empty");
                    else $(e).removeClass("empty")
                });
            });
            selectList.each(function(i, e) {
                $(e).change();
            });

            // Init tagsinput plugin
            $("input#tagsinput").tagsinput({
                tagClass: function(item) {
                    return 'label bg-primary light';
                }
            });

        });
    </script>
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
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
