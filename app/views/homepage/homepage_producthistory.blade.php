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
                    <li class="#">Product History</li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="admin-form">
                <div class="col-md-3">
                    <div class="tray tray-center ph20 pv30 va-t posr">
                        <div class="row  mt5">
                            <div class="col-md-12 ">
                                <div class="row panel-body mt5" style="background: #EEEEEE;">
                                    <h3>Products</h3>

                                    <?php $i=1; ?>
                                    @foreach($parentproduct as $product)
                                        <div class="col-md-12 mb5 pb0">

                                            <div class="panel-group accordion accordion-lg mb5 pb0 " id="accordion{{ $i }}">
                                                @foreach($categoriesproduct as $categoryp)
                                                    @if($categoryp->id_parent == $product->id_category)
                                                        <a class="accordion-toggle accordion-icon link-unstyled collapsed mt5 mb0 pb0 fs15 fw400" data-toggle="collapse" data-parent="#accordion{{ $i }}" href="#accord{{ $i }}">
                                                            {{$product->category_name}}
                                                        </a>
                                                    @endif
                                                    @if($categoryp->id_parent == $product->id_category)
                                                        <div id="accord{{ $i }}" class="panel-body panel-collapse collapse mb0 ml5 pb5 pt5 pl0 animated fadeIn">
                                                            @foreach($subcategory as $categoryp)
                                                                @if($categoryp->id_parent == $product->id_category)
                                                                    <a href="{{URL::route('product-category-link',$categoryp->id_category)}}" class="link-unstyled center-block animated fadeIn mb5 fs14 ">{{$categoryp->category_name}}</a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        <?php $i++;?>
                                    @endforeach

                                    <h3>Services</h3>
                                    <?php $i=1; ?>
                                    @foreach($parentservice as $service)
                                        <div class="col-md-12 mb0 pb0">
                                            <div class="panel-group accordion accordion-lg mb5 pb0 " id="accordion{{ $i }}s">
                                                @foreach($categoriesproduct as $categorys)
                                                    @if($categorys->id_parent == $product->id_category)
                                                        <a class="accordion-toggle accordion-icon link-unstyled collapsed mt5 mb0 pb0 fs15 fw400" data-toggle="collapse" data-parent="#accordion{{ $i }}s" href="#accord{{ $i }}s">
                                                            {{$service->category_name}}
                                                        </a>
                                                    @endif
                                                    @if($categorys->id_parent == $product->id_category)
                                                        <div id="accord{{ $i }}s" class="panel-body panel-collapse collapse mb0 ml5 pb5 pt5 pl0 animated fadeIn">
                                                            @foreach($subcategorys as $categorys)
                                                                @if($categorys->id_parent == $service->id_category)
                                                                    <a href="{{URL::route('product-category-link',$categorys->id_category)}}" class="link-unstyled center-block animated fadeIn mb5 fs14 ">{{$categorys->category_name}}</a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <?php $i++;?>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-9 mt40 mb20">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-visible table-responsive" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        Product History
                                    </div>
                                </div>
                                <div class="panel-body pn">
                                    <div class="table-responsive">

                                        <table class="table table-striped table-hover" id="datatable2" >
                                            <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Version</th>
                                                <th class="text-center">Product Owner</th>
                                                <th class="text-center">Reversion By</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Download</th>

                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php $i=1; ?>
                                            @foreach($histories as $items)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$items->produk_version}}</td>
                                                    <td>{{$items->name}}</td>
                                                    @foreach($userhistory as $edited)
                                                        @if($items->reversioning_by != 0)
                                                            <td>{{$edited->reversionoffer}}</td>
                                                        @endif
                                                        @if($items->reversioning_by ==0)
                                                                <td>-</td>
                                                        @endif


                                                    @endforeach

                                                    <td>{{$items->updated_at}}</td>
                                                    <td>
                                                        @if(Auth::check())
                                                            @if($items->available ==1 )
                                                                <a href="{{URL::route('download-freemium',$items->produk_link)}}">Download</a>
                                                            @endif
                                                        @endif
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
            </div>
        </div>
    </div>

</section>



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