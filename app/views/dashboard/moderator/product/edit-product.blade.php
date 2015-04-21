<!DOCTYPE html>
<html>

<head>

    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}
    {{HTML::style('templates/theme/vendor/editors/summernote/summernote.cs')}}
    {{HTML::style('templates/theme/vendor/plugins/dropzone/css/dropzone.css')}}
</head>

<body class="ecommerce-page">

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top bg-light">
            <div class="navbar-branding">
                <a class="navbar-brand" href="dashboard.html"> <b>Admin</b>Designs </a>
                <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
                <ul class="nav navbar-nav pull-right hidden">
                    <li>
                        <a href="#" class="sidebar-menu-toggle">
                            <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="sidebar-menu-toggle" href="#">
                        <span class="octicon octicon-ruby fs18"></span>
                    </a>
                </li>
                <li>
                    <a class="topbar-menu-toggle" href="#">
                        <span class="glyphicons glyphicons-magic fs16"></span>
                    </a>
                </li>
                <li>
                    <span id="toggle_sidemenu_l2" class="glyphicon glyphicon-log-in fa-flip-horizontal hidden"></span>
                </li>
                <li class="dropdown hidden">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicons glyphicons-settings fs14"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-times-circle-o pr5 text-primary"></span> Reset LocalStorage </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-slideshare pr5 text-info"></span> Force Global Logout </a>
                        </li>
                        <li class="divider mv5"></li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-tasks pr5 text-danger"></span> Run Cron Job </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-wrench pr5 text-warning"></span> Maintenance Mode </a>
                        </li>
                    </ul>
                </li>
                <li class="hidden-xs">
                    <a class="request-fullscreen toggle-active" href="#">
                        <span class="octicon octicon-screen-full fs18"></span>
                    </a>
                </li>
            </ul>
            <form class="navbar-form navbar-left navbar-search ml5" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search..." value="Search...">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-item-slide">
                    <a class="dropdown-toggle pl10 pr10" data-toggle="dropdown" href="#">
                        <span class="octicon octicon-radio-tower fs18"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-hover dropdown-persist pn w350 bg-white animated animated-shorter fadeIn" role="menu">
                        <li class="bg-light p8">
                            <span class="fw600 pl5 lh30"> Notifications</span>
                            <span class="label label-warning label-sm pull-right lh20 h-20 mt5 mr5">12</span>
                        </li>
                        <li class="p10 br-t item-1">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                        <li class="p10 br-t item-2">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                        <li class="p10 br-t item-3">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/4.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                        <li class="p10 br-t item-4">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="flag-xs flag-us"></span>
                        <span class="fw600">US</span>
                    </a>
                    <ul class="dropdown-menu animated animated-short flipInX" role="menu">
                        <li>
                            <a href="javascript:void(0);" class="fw600">
                                <span class="flag-xs flag-in mr10"></span> Hindu </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="fw600">
                                <span class="flag-xs flag-tr mr10"></span> Turkish </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="fw600">
                                <span class="flag-xs flag-es mr10"></span> Spanish </a>
                        </li>
                    </ul>
                </li>
                <li class="ph10 pv20 hidden-xs"> <i class="fa fa-circle text-tp fs8"></i>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15">
                        <span>John.Smith</span>
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        <li class="bg-light br-b br-light p8">
                            <span class="pull-left ml10">
                                <select id="user-status">
                                    <optgroup label="Current Status:">
                                        <option value="1-1">Away</option>
                                        <option value="1-2">Offline</option>
                                        <option value="1-3" selected="selected">Online</option>
                                    </optgroup>
                                </select>
                            </span>

                            <span class="pull-right mr10">
                                <select id="user-role">
                                    <optgroup label="Logged in As:">
                                        <option value="1-1">Client</option>
                                        <option value="1-2">Editor</option>
                                        <option value="1-3" selected="selected">Admin</option>
                                    </optgroup>
                                </select>
                            </span>
                            <div class="clearfix"></div>

                        </li>
                        <li class="of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInUp">
                                <span class="fa fa-envelope pr5"></span> Messages
                                <span class="pull-right lh20 h-20 label label-warning label-sm">2</span>
                            </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInUp">
                                <span class="fa fa-user pr5"></span> Friends
                                <span class="pull-right lh20 h-20 label label-warning label-sm">6</span>
                            </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-gear pr5"></span> Account Settings </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- End: Header -->

        @include('dashboard.moderator.menu_moderator')

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">


            <!-- Start: Topbar -->
            <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="dashboard.html">Edit Product</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="dashboard.html">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-trail">Home</li>
                    <li class="crumb-trail">Manage Product</li>
                    <li class="crumb-trail">Edit Product</li>
                </ol>
            </div>

            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

                <!-- begin: .tray-center -->
                <div class="tray tray-center p25 va-t posr">

                    <!-- create new order panel -->
                    <div class="panel mb25 mt5">
                        <div class="panel-heading">
                            <ul class="nav panel-tabs-border panel-tabs">
                                <li class="active">
                                    <a href="#tab1_1" data-toggle="tab">General</a>
                                </li>
                                <li>
                                    <a href="#tab1_2" data-toggle="tab">Description</a>
                                </li>
                                <li>
                                    <a href="#tab1_3" data-toggle="tab">Upload Gallery</a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body p20 pb10">
                            <div class="tab-content pn br-n admin-form">
                                <div id="tab1_1" class="tab-pane active">

                                    <div class="section row mbn">
                                        <div class="col-md-4">
                                            <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                                <div class="fileupload-preview thumbnail mb20">
                                                    <img data-src="holder.js/100%x140" alt="holder">
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-7 pr5">
                                                        <input type="text" name="name2" id="name2" class="text-center event-name gui-input br-light bg-light" placeholder="Img Keywords">
                                                        <label for="name2" class="field-icon"></label>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <span class="button btn-system btn-file btn-block">
                                                            <span class="fileupload-new">Select</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input type="file">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl15">
                                            <div class="section mb10">
                                                <label for="name2" class="field prepend-icon">
                                                    <input type="text" name="name2" id="name2" class="event-name gui-input br-light light" placeholder="Product Title">
                                                    <label for="name2" class="field-icon"><i class="fa fa-tag"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="section mb10">
                                                <label class="field prepend-icon">
                                                    <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="comment" name="comment" placeholder="Product Description"></textarea>
                                                    <label for="comment" class="field-icon"><i class="fa fa-comments"></i>
                                                    </label>
                                                    <span class="input-footer hidden">
                                                            <strong>Hint:</strong>Don't be negative or off topic! just be awesome...</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="section row mbn">
                                        <div class="col-sm-12">
                                            <p class="text-right">
                                                <a href="#tab1_2" data-toggle="tab">
                                                    <button class="btn btn-primary" href="#tab1_2" type="button">Next</button>
                                                </a>
                                            </p>
                                        </div>
                                    </div>


                                </div>
                                <div id="tab1_2" class="tab-pane">

                                    <div class="section row">
                                        <div class="col-md-6">
                                            <label for="product-category" class="field select">
                                                <select id="product-category" name="product-category">
                                                    <option value="0" selected="selected">Product Category...</option>
                                                    <option value="1">Software</option>
                                                    <option value="2">Computers</option>
                                                    <option value="3">Gadgets</option>
                                                    <option value="4">Clothing</option>
                                                </select>
                                                <i class="arrow double"></i>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="col-md-6">
                                            <label class="field select">
                                                <select id="product-status" name="product-status">
                                                    <option value="0" selected="selected">Product Availability</option>
                                                    <option value="1">Available</option>
                                                    <option value="2">Unavailable</option>
                                                    <option value="3">Discontinued</option>
                                                    <option value="4">Out of Stock</option>
                                                </select>
                                                <i class="arrow double"></i>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                    <!-- end section row section -->

                                    <div class="section row">
                                        <div class="col-md-4">
                                            <label for="product-price" class="field prepend-icon">
                                                <input type="text" name="product-price" id="product-price" class="gui-input" placeholder="Product Price...">
                                                <label for="product-price" class="field-icon"><i class="fa fa-usd"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="col-md-4">
                                            <label for="product-vendor" class="field prepend-icon">
                                                <input type="text" name="product-vendor" id="product-vendor" class="gui-input" placeholder="Vendor Source...">
                                                <label for="product-vendor" class="field-icon"><i class="fa fa-shopping-cart"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="col-md-4">
                                            <label for="product-sku" class="field prepend-icon">
                                                <input type="text" name="product-sku" id="product-sku" class="gui-input" placeholder="Product SKU...">
                                                <label for="product-sku" class="field-icon"><i class="fa fa-barcode"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                    <!-- end section row section -->

                                    <div class="section">
                                        <input id="tagsinput" type="text" value="Software, Adobe, Photoshop, Editor, Commercial">
                                    </div>
                                    <!-- end section row section -->

                                    <hr class="short alt">

                                    <div class="section row mbn">
                                        <div class="col-sm-12">
                                            <p class="text-right">
                                                 <a href="#tab1_3" data-toggle="tab">
                                                    <button class="btn btn-primary" href="#tab1_2" type="button">Next</button>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end section -->

                                </div>
                                <div id="tab1_3" class="tab-pane">

                                    <div class="section row">
                                        <div class="col-xs-12 col-sm-8 pl30">
                                            <div class="tray-bin pl10 mb10" style="min-height: 250px;">
                                                <h5 class="text-muted mt10 fw600 pl10"><i class="fa fa-exclamation-circle text-info fa-lg pr10"></i> Portlet Drag and Drop Uploader </h5>
                                                <form action="/file-upload" class="dropzone dropzone-sm" id="dropZone">
                                                    <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section row mbn">
                                        <div class="col-sm-12">
                                            <p class="text-right">
                                                <button class="btn btn-primary" type="button">Save Order</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

            
            </section>
            <!-- End: Content -->

        </section>

        <!-- Start: Right Sidebar -->
        <aside id="sidebar_right" class="nano">
            <div class="sidebar_right_content nano-content">
                <div class="tab-block sidebar-block br-n">
                    <ul class="nav nav-tabs tabs-border nav-justified hidden">
                        <li class="active">
                            <a href="#sidebar-right-tab1" data-toggle="tab">Tab 1</a>
                        </li>
                        <li>
                            <a href="#sidebar-right-tab2" data-toggle="tab">Tab 2</a>
                        </li>
                        <li>
                            <a href="#sidebar-right-tab3" data-toggle="tab">Tab 3</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n">
                        <div id="sidebar-right-tab1" class="tab-pane active">

                            <h5 class="title-divider text-muted mb20"> Server Statistics <span class="pull-right"> 2013 <i class="fa fa-caret-down ml5"></i> </span> </h5>
                            <div class="progress mh5">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
                                    <span class="fs11">DB Request</span>
                                </div>
                            </div>
                            <div class="progress mh5">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
                                    <span class="fs11 text-left">Server Load</span>
                                </div>
                            </div>
                            <div class="progress mh5">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
                                    <span class="fs11 text-left">Server Connections</span>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
                            <div class="row">
                                <div class="col-xs-5">
                                    <h3 class="text-primary mn pl5">132</h3>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h3 class="text-success-dark mn"> <i class="fa fa-caret-up"></i> 13.2% </h3>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
                            <div class="row">
                                <div class="col-xs-5">
                                    <h3 class="text-primary mn pl5">212</h3>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h3 class="text-success-dark mn"> <i class="fa fa-caret-up"></i> 25.6% </h3>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
                            <div class="row">
                                <div class="col-xs-5">
                                    <h3 class="text-primary mn pl5">82.5</h3>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h3 class="text-danger mn"> <i class="fa fa-caret-down"></i> 17.9% </h3>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt40 mb20"> Server Statistics <span class="pull-right text-primary fw600">USA</span> </h5>
                            <div id="sidebar-right-map" class="hide-jzoom" style="width: 100%; height: 180px;"></div>

                        </div>
                        <div id="sidebar-right-tab2" class="tab-pane"></div>
                        <div id="sidebar-right-tab3" class="tab-pane"></div>
                    </div>
                    <!-- end: .tab-content -->
                </div>
            </div>
        </aside>
        <!-- End: Right Sidebar -->

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
    {{HTML::script('templates/theme/vendor/plugins/dropzone/dropzone.min.js')}}
    {{HTML::script('templates/theme/assets/js/bootstrap/holder.min.js')}}
    {{HTML::script('templates/theme/vendor/plugins/tagsinput/tagsinput.min.js')}}
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


            // Dropzone autoattaches to "dropzone" class.
            // Configure Dropzone options
            Dropzone.options.dropZone = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 0, // MB

                addRemoveLinks: true,
                dictDefaultMessage: '<i class="fa fa-cloud-upload"></i> \
         <span class="main-text"><b>Drop Files</b> to upload</span> <br /> \
         <span class="sub-text">(or click)</span> \
        ',
                dictResponseError: 'Server not Configured'
            };

            Dropzone.options.dropZone2 = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 0, // MB

                addRemoveLinks: true,
                dictDefaultMessage: '<i class="fa fa-cloud-upload"></i> \
         <span class="main-text"><b>Drop Files</b> to upload</span> <br /> \
         <span class="sub-text">(or click)</span> \
        ',
                dictResponseError: 'Server not Configured'
            };

            // demo code
            setTimeout(function() {
                var Drop = $('#dropZone2');
                Drop.addClass('dz-started dz-demo');

                setTimeout(function() {
                    $('.example-preview').each(function(i, e) {
                        var This = $(e);

                        var thumbOut = setTimeout(function() {
                            Drop.append(This);
                            This.addClass('animated fadeInRight').removeClass('hidden');
                        }, i * 135);

                    });
                }, 750);

            }, 800);

            // Demo code 
            $('.example-preview').on('click', 'a.dz-remove', function() {
                $(this).parent('.example-preview').remove();
            });


        });
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
