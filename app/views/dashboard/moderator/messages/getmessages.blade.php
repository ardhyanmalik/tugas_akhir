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
        {{HTML::script('templates/theme/vendor/editors/ckeditor/ckeditor.js')}}

        {{HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}}
        {{HTML::script('https://codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js')}}
    </head>
    <body class="messages-page" style="min-height: 800px">
        <div id="main">
            @include('dashboard.admin_moderator_header')
            @include('dashboard.moderator.menu_moderator')

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
                                        <a href="{{URL::route('dashboard-moderator-messages-compose')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                            <span class="fa fa-envelope pr5"></span> Compose Message
                                        </a>
                                    </li>
                                <li class="">
                                    <a href="{{URL::route('dashboard-moderator-messages-inbox')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                        <span class="fa fa-envelope pr5"></span> Inbox
                                        <span class="pull-right lh20 h-20 label label-warning label-sm">12</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{URL::route('dashboard-moderator-messages-sendbox')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                        <span class="fa fa-envelope pr5"></span> Sentbox
                                        <span class="pull-right lh20 h-20 label label-warning label-sm">12</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </aside>
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
        </script>
    </body>
</html>