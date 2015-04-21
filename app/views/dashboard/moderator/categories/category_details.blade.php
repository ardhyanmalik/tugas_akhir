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
<div id="main">
    @include('dashboard.admin_moderator_header')
    @include('dashboard.moderator.menu_moderator')


    <section id="content_wrapper">
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="#">Categories</a>
                    </li>
                    <li class="crumb-link">
                        <a href="{{URL::route('dashboard-moderator')}}">Dashboard</a>
                    </li>
                    <li class="crumb-trail">Manage Product</li>
                    <li class="crumb-trail">Categories</li>
                    <li class="crumb-trail">Sub-Categories</li>
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
                <div class="pull-right mb5 mt5">
                    <a href="#modal-addcategory" class="modal-example-btn btn btn-lg btn-system"><i class="fa fa-plus"></i> Add Product Category </a>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-visible table-responsive" id="spy2">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="fa fa-tags"></span>Sub-Categories</div>
                            </div>
                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="datatable2" >
                                        <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sub-Categories Name</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php $i=1; ?>
                                        @foreach($category as $categories)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{$categories->category_name}}</td>
                                                <td>
                                                    <?php
                                                    if($categories->category_status==1){
                                                        echo "Available";
                                                    }else{
                                                        echo "Not-Available";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-info" title="Details"><i class="fa fa-info-circle"></i></a>
                                                        <a href="#modal-editcategory" onclick="getEdit('{{$categories->category_name}}');" class="modal-example-btn btn btn-system" title="Edit Category"><i class="fa fa-pencil"></i></a>
                                                        <a href="{{URL::route('dashboard-moderator-content-categories-bancategory',$categories->id_category)}}" class="btn btn-warning" onclick="return confirm('Are you sure Banned this category?')" title="Ban Category"><i class="fa fa-ban"></i></a>
                                                        <a href="{{URL::route('dashboard-moderator-content-categories-deletecategory',$categories->id_category)}}" class="btn btn-danger"  onclick="return confirm('Are you sure Delete this category?')" title="Delete Category"><i class="fa fa-trash"></i></a>
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

                    <div id="modal-addcategory" class=" popup-basic admin-form mfp-with-anim mfp-hide">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title"><i class="fa fa-plus"></i>Add Sub Category</span>
                            </div>
                            <!-- end .panel-heading section -->
                                <form action="{{URL::route('dashboard-moderator-content-categories-subcategory-addcategory')}}" method="post"  id="category_name">
                                    <div class="panel-body p25">

                                        <div class="section row">

                                            <div class="section row">
                                                <div class="col-md-12 ">
                                                    @foreach($parent as $parents)
                                                        <label for="category" class="field prepend-icon">
                                                            <input type="text" name="category_parent" id="category_parent" class="gui-input" placeholder="Category Name" value="{{$parents->category_name}}" readonly>
                                                            <label for="Title" class="field-icon"><i class="fa fa-tags"></i>
                                                            </label>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="section row">
                                                <div class="col-md-12">
                                                    <label for="category" class="field prepend-icon">
                                                        <input type="text" name="category_name" id="category_name" class="gui-input" placeholder="Sub-Category Name">
                                                        <label for="Title" class="field-icon"><i class="fa fa-tags"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="panel-footer text-right">
                                        <input type="submit" class="button btn-primary" value="Submit"/>
                                        {{ Form::token() }}
                                    </div>
                                </form>

                        </div>

                    </div>
                @foreach($category as $cek)
                @if($cek->id_category !=null)
                <div id="modal-editcategory" class=" popup-basic admin-form mfp-with-anim mfp-hide">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="fa fa-edit"></i>Edit Category</span>
                        </div>
                        <!-- end .panel-heading section -->

                        <form  action="{{URL::route('dashboard-moderator-content-categories-updatesubcategory',$cek->id_category)}}" method="post" id="editcategory">
                            <div class="panel-body p25">

                                <div class="section row">
                                        <div class="section row">
                                            <div class="col-md-12 ">
                                                <label for="category" class="field prepend-icon">
                                                    <input type="text" name="category_name" id="old_category_name" class="gui-input" placeholder="Category Name">
                                                    <label for="Title" class="field-icon"><i class="fa fa-tags"></i>
                                                    </label>
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                            </div>

                            <div class="panel-footer text-right">
                                <input type="submit" class="button btn-primary" value="Submit"/>
                                {{ Form::token() }}
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
            </div>



        </section>


    </section>
</div>

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
<script>
    function getEdit(category_name) {
        document.getElementById("old_category_name").value = category_name;
    }
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
</body>