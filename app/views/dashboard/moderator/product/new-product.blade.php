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

        @include('dashboard.admin_moderator_header')
        @include('dashboard.moderator.menu_moderator')

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">


            <!-- Start: Topbar -->
            <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="dashboard.html">New Product</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="dashboard.html">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-trail">Home</li>
                    <li class="crumb-trail">Manage Product</li>
                    <li class="crumb-trail">New Product</li>
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
