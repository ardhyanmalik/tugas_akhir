!DOCTYPE html>
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
<body>
	<!-- Start: Main -->
<div id="main">
    @include('dashboard.admin_moderator_header')
    @include('dashboard.sales.menu_sales')

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

                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-visible table-responsive" id="spy2">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="fa fa-check-circle"></span>Need Aproval</div>
                            </div>
                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="datatable2" >
                                        <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Product Title</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Contributor</th>
                                            <th class="text-center">Type Product</th>
                                            <th class="text-center">Initiate Date</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <tr>
                                            <td>1</td>
                                            <td>Product Name</td>
                                            <td>Software</td>
                                            <td>User 1</td>
                                            <td>Premium</td>
                                            <td>24-02-2015 13:25</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-system"><i class="fa fa-check-circle"></i></a>
                                                    <a href="#" class="btn btn-warning"><i class="fa fa-info-circle"></i></a>
                                                    <a href="#" class="btn btn-danger"><i class="fa fa-ban"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Product Name</td>
                                            <td>Hardware</td>
                                            <td>User 2</td>
                                            <td>Freemium</td>
                                            <td>24-02-2015 13:25</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="modal-example-btn btn btn-system"><i class="fa fa-check-circle"></i></a>
                                                    <a href="#" class="btn btn-warning"><i class="fa fa-info-circle"></i></a>
                                                    <a href="#" class="btn btn-danger"><i class="fa fa-ban"></i></a>
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

            </div>



        </section>


    </section>




</div>
<!-- End: Main -->
</body>
</html>