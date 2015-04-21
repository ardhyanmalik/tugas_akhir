<!DOCTYPE html>
<html>
    <head>
        @include('master.meta')
        {{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
        {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
        {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
        {{HTML::style('templates/theme/assets/admin-tools/admin-plugins/admin-dock/dockmodal.css')}}
        {{HTML::style('templates/theme/vendor/editors/summernote/summernote.css')}}
        {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}
        {{HTML::style('templates/theme/vendor/editors/summernote/summernote.cs')}}
        {{HTML::style('templates/theme/vendor/plugins/datepicker/css/bootstrap-datetimepicker.min.css')}}
        {{HTML::style('templates/theme/vendor/plugins/daterange/daterangepicker.css')}}
        {{HTML::style('templates/theme/vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css')}}
        {{HTML::style('templates/theme/vendor/plugins/tagmanager/tagmanager.css')}}
        {{HTML::style('templates/theme/assets/js/utility/highlight/styles/googlecode.css')}}
 
        {{HTML::script('templates/theme/vendor/editors/ckeditor/ckeditor.js')}}
        {{HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}}
        {{HTML::script('https://codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js')}}
    </head>
    <body class="messages-page" style="min-height: 800px">
        <div id="main">
            @include('dashboard.guest_header')
            @include('dashboard.sales.menu_sales')


            <section id="content_wrapper">

                <!-- Start: Topbar -->
                <header id="topbar">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="crumb-active">
                                <a href="#">Manage Messages</a>
                            </li>
                            <li class="crumb-link">
                                <a href="#">Home Page</a>
                            </li>
                            <li class="crumb-trail">Manage Message</li>
                            <li class="crumb-trail">Compose Message</li>
                        </ol>
                    </div>
                </header>
                <!-- End: Topbar -->

                <section id="content" class="table-layout animated fadeIn">
                    <!-- begin: .tray-left -->
                    <aside class="tray tray-left pn va-t tray250" data-tray-height="match">

                        <!-- message menu  -->
                        <div class="p10">
                            <!-- menu links -->
                            <h4 class="ph10 mt10 mb5"> Messages </h4>
                            <ul class="nav nav-messages p5" role="menu">
                                <li class="active">
                                        <a href="{{URL::route('dashboard-sales-messages-compose')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                            <span class="fa fa-envelope pr5"></span> Compose Message
                                        </a>
                                    </li>
                                <li class="">
                                    <a href="{{URL::route('dashboard-sales-messages-inbox')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                        <span class="fa fa-envelope pr5"></span> Inbox
                                        <span class="pull-right lh20 h-20 label label-warning label-sm">12</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{URL::route('dashboard-sales-messages-sendbox')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                        <span class="fa fa-envelope pr5"></span> Sentbox
                                        <span class="pull-right lh20 h-20 label label-warning label-sm">12</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </aside>

                    <!-- begin: .tray-center -->
                    <div class="tray tray-center pn va-t bg-light">
                        <!-- Registration 2 -->
                        <div class="admin-form tab-pane" id="register2" role="tabpanel">
                            <div class="panel panel-danger heading-border">
                                <div class="panel-heading">
                                    <span class="panel-title"><i class="fa fa-pencil-square"></i>Compose Messages
                                    </span>
                                </div>
                                <!-- end .form-header section -->

                            
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
                                
                                <form method="post" action="{{URL::route('messages-sales-create')}}" id="messages">                                
                                    <div class="panel-body p25">
                                        <div class="section mb10">
                                                <label for="Send to" class="field select">
                                                    {{ Form::select('id_user_receiver', $user , Input::old('id_user_receiver')) }}
                                                    <i class="arrow double"></i>
                                                </label>
                                        </div> 
                                        <div class="section">
                                            <label for="send_to" class="field prepend-icon">
                                                <input type="text" name="subject" id="name" class="gui-input" placeholder="Subject ">
                                                <label for="name" class="field-icon"><i class="fa fa-envelope"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <div class="section">
                                            <!-- ckeditor -->
                                            <textarea id="ckeditor1" name="message_post" rows="12" placeholder="Content Messages">
                                            </textarea>
                                        </div>
                                        <div class="section">

                                        </div>

                                        <!-- end section -->
                                    </div>
                                    <div class="panel-footer text-right">
                                        <button type="submit" class="button btn-primary">Sent</button>
                                    </div>
                                    <!-- end .section row section -->
                                </form>
                            </div>
                            <!-- end .admin-form section -->
                        </div>
                        <!-- end: .admin-form -->
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
        {{HTML::script('templates/theme/vendor/editors/ckeditor/ckeditor.js')}}
        {{HTML::script('templates/theme/vendor/plugins/jquerymask/jquery.maskedinput.min.js')}}

        {{HTML::script('templates/theme/assets/js/utility/utility.js')}}
        {{HTML::script('templates/theme/assets/js/main.js')}}
        {{HTML::script('templates/theme/assets/js/demo.js')}}

        {{HTML::script('http://code.jquery.com/jquery-1.10.2.js')}}
        {{HTML::script('http://code.jquery.com/ui/1.11.4/jquery-ui.js')}}


        <script type="text/javascript">

        jQuery(document).ready(function() {


        // Turn off automatic editor initilization.
        // Used to prevent conflictions with multiple text 
        // editors being displayed on the same page.
        CKEDITOR.disableAutoInline = true;

        // Init Ckeditor
        CKEDITOR.replace('ckeditor1', {
            height: 210,
            on: {
                instanceReady: function(evt) {
                    $('.cke').addClass('admin-skin cke-hide-bottom');
                }
            },
        });

            // Init Inline Ckeditors
            CKEDITOR.inline('ckeditor-inline1');
            CKEDITOR.inline('ckeditor-inline2');
        });

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS    
            Demo.init();

            // Init Boostrap Multiselect
            $('#multiselect1').multiselect();
            $('#multiselect2').multiselect({
                includeSelectAllOption: true
            });
            $('#multiselect3').multiselect();
            $('#multiselect4').multiselect({
                enableFiltering: true,
            });
            $('#multiselect5').multiselect({
                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-primary'
            });
            $('#multiselect6').multiselect({
                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-info'
            });
            $('#multiselect7').multiselect({
                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-success'
            });
            $('#multiselect8').multiselect({
                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-warning'
            });
        </script>
    </body>
</html>