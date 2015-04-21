<!DOCTYPE html>
<html>

<head>
    @include('master.meta')
    {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/vendor/plugins/dropzone/css/dropzone.css')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}


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
                        <a href="#">Freemium</a>
                    </li>
                    <li class="crumb-trail">Dashboard</li>
                    <li class="crumb-trail">TEL_US Content</li>
                    <li class="crumb-trail">Initiate Product</li>
                    <li class="crumb-trail">Freemium</li>
                </ol>
            </div>

        </header>

        <section id="content" class="animated fadeIn">
            <div class="tray tray-center p5 va-t posr">

                <!-- create new order panel -->
                <div class="panel mb5 mt5">
                    <div class="panel-heading">
                        <span class="panel-title"> Add New Product</span>
                        <ul class="nav panel-tabs-border panel-tabs">
                            <li class="active">
                                <a href="#tab1_1" data-toggle="tab">Basic Information</a>
                            </li>
                            <li>
                                <a href="#tab1_2" data-toggle="tab">Product's Assets</a>
                            </li>
                            <li>
                                <a href="#tab1_3" data-toggle="tab">Product's Description</a>
                            </li>
                        </ul>
                    </div>

                        <div class="panel-body p20 pb10">
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
                            {{Form::open(array('route'=>array('dashboard-contributor-manageproduct-postfreemium',Auth::user()->id_user),'files'=>true))}}
                            <div class="tab-content pn br-n admin-form">
                                <div id="tab1_1" class="tab-pane active">
                                    <div class="section row mbn">
                                        <div class="col-md-4">
                                            <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                                <div class="fileupload-preview thumbnail mb20">
                                                    <img data-src="holder.js/100%x140" alt="holder">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb10" >
                                                                    <span class="button btn-system btn-file btn-block">
                                                                        <span class="fileupload-new">Product's Picture</span>
                                                                    <span class="fileupload-exists">Change</span>
                                                                    <input type="file" name="productava">
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl15">
                                            <div class="section mb10">
                                                <label for="name2" class="field prepend-icon">
                                                    <input type="text" name="producttitle" id="producttitle" class="event-name gui-input br-light light" placeholder="Product Title" {{ (Input::old('producttitle')) ? ' value="'. e(Input::old('producttitle')).'"':' ' }}>
                                                    <label for="producttitle" class="field-icon"><i class="fa fa-tag"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="section mb10">
                                                <label for="name2" class="field prepend-icon">
                                                    <input type="text" name="categorytype" id="name2" class="event-name gui-input br-light light" placeholder="Freemium Category" value="Freemium Category" {{ (Input::old('categorytype')) ? ' value="'. e(Input::old('categorytype')).'"':' ' }} disabled>
                                                    <label for="name2" class="field-icon"><i class="fa fa-tag"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="section mb10">
                                                <label for="product-category" class="field select">
                                                    {{ Form::select('productcategory', $category , Input::old('productcategory')) }}
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                            <div class="section mb10">
                                                <label class="field select">
                                                    <select id="location" name="version_available">
                                                        <option value="">Select Versioning Availability</option>
                                                        <option value="1">Available</option>
                                                        <option value="0">Not-Available</option>
                                                    </select>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                            <div class="section mb10">
                                                <label class="field prepend-icon">
                                                    <textarea class="gui-textarea" id="produk_introduction" name="produk_introduction" placeholder="Product's introduction goes here"  >{{(Input::old('produk_introduction'))}}</textarea>
                                                    <label for="comment" class="field-icon"><i class="fa fa-bell"></i>
                                                    </label>
                                                            <span class="input-footer">
                                                                <strong>Hint:</strong> Please write something to persuade anyone look at to your product (max 160 characters)
                                                            </span>
                                                </label>
                                            </div>
                                            <div class="section mb10">
                                                <span>Product File :</span>
                                                <label class="field prepend-icon file">
                                                    <span class="button">Choose File</span>
                                                    <input type="file" class="gui-file" name="productfile" id="productfile" onChange="document.getElementById('uploader2').value = this.value;">
                                                    <input type="text" class="gui-input" id="uploader2" placeholder="Please Select A File (max size: 25MB)">
                                                    <label class="field-icon"><i class="fa fa-upload"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab1_2" class="tab-pane">
                                    <div class="section row table-layout">
                                        <div class="col-md-12">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-sm-12 col-md-3 col-lg-3 control-label">Product's Pictures <br><span class="text-danger">(min 2 pics,max 5 pics)</span><br><span class="text-danger">PNG and JPEG formats only</span></label>
                                                    <div class="col-md-8 mt10 mb10">
                                                        <div class="from-group">
                                                            <label class="field prepend-icon file">
                                                                <span class="button">Choose File</span>
                                                                <input type="file" class="gui-file" name="productpictures[]" id="productpictures" onChange="document.getElementById('uploader3').value = this.value;" multiple>
                                                                <input type="text" class="gui-input" id="uploader3" placeholder="Please Select Picture Files (max size: 2MB/file)">
                                                                <label class="field-icon"><i class="fa fa-upload"></i>
                                                                </label>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-12 col-md-3 col-lg-3 control-label">Youtube Video<br><span class="text-danger">(Optional)</span></label>
                                                    <div class="col-md-8 mt10 mb10">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                                                                <input type="text" name="youtubelink" class="form-control" placeholder="Youtube video link" {{ (Input::old('youtubelink')) ? ' value="'. e(Input::old('youtubelink')).'"':' ' }}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="tab1_3" class="tab-pane">
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <!-- ckeditor -->
                                            <h4 class="text-muted text-center mb20 fw400">Write down your product's description as details as you can</h4>
                                                    <textarea id="ckeditor1" name="productdescription" rows="12">
                                                    </textarea>
                                                    <span class="input-footer">
                                                        <strong>Note:</strong> Product description will appear in product details page
                                                    </span>
                                        </div>
                                    </div>
                                    <hr class="short alt">

                                    <div class="section row mbn">

                                        <div class="col-md-12">
                                            <p class="text-right">
                                                <button class="btn btn-primary" type="submit">Publish Product</button>
                                                {{ Form::token() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{Form::close()}}

                        </div>


                </div>
            </div>
        </section>


    </section>




</div>
<style>
    /*dropzone demo css*/
    .dz-demo .dz-message {
        opacity: 0 !important;
    }
    .dropzone .dz-preview.example-preview .dz-success-mark,
    .dropzone-previews .dz-preview.example-preview .dz-success-mark {
        opacity: 1;
    }
    .dropzone .dz-preview.example-preview .dz-error-mark,
    .dropzone-previews .dz-preview.example-preview .dz-error-mark {
        opacity: 0;
    }
</style>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}
{{HTML::script('templates/theme/vendor/editors/ckeditor/ckeditor.js')}}
{{HTML::script('templates/theme/vendor/plugins/dropzone/dropzone.min.js')}}



{{HTML::script('templates/theme/vendor/plugins/fileupload/fileupload.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/holder.min.js')}}
{{HTML::script('templates/theme/vendor/plugins/tagsinput/tagsinput.min.js')}}

{{HTML::script('templates/theme/assets/admin-tools/admin-forms/js/advanced/steps/jquery.steps.js')}}
{{HTML::script('templates/theme/assets/admin-tools/admin-forms/js/jquery.validate.min.js')}}

{{HTML::script('templates/theme/assets/js/utility/utility.js')}}
{{HTML::script('templates/theme/assets/js/main.js')}}
{{HTML::script('templates/theme/assets/js/demo.js')}}

<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";
        Core.init();
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



    });
</script>





</body>