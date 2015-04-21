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

</head>
 
<body class="messages-page" style="min-height: 800px">

    <!-- Start: Main -->
    <div id="main">
        @include('dashboard.admin_moderator_header')
        @include('dashboard.guest.menu_guest')
        
        <!-- Start: Content-Wrapper -->
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
                        <li class="crumb-trail">Sentbox Message</li>
                    </ol>
                </div>
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">

                <div class="row">

                    <!-- message tray -->
                    <div class="col-md-3 pl5-md message-tray">

                         <!-- message tray panel -->
                        <div class="panel">
                            <div class="panel-body p10">
                                <h4 class="ph10 mv5"> Menu </h4>
                                <ul class="nav nav-messages p5" role="menu">
                                    <li class="">
                                        <a href="{{URL::route('dashboard-guest-messages-compose')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                            <span class="fa fa-envelope pr5"></span> Compose Message
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{URL::route('dashboard-guest-messages-inbox')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                            <span class="fa fa-envelope pr5"></span> Inbox
                                            <span class="pull-right lh20 h-20 label label-warning label-sm">12</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{URL::route('dashboard-guest-messages-sendbox')}}" class="text-dark fw600 p8 animated animated-short fadeInDown">
                                            <span class="fa fa-envelope pr5"></span> Sentbox
                                            <span class="pull-right lh20 h-20 label label-warning label-sm">12</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                   </div>

                    <!-- message listing panel -->
                    <div class="col-md-9 prn-md animated fadeIn">
                        <div class="panel">
                            <!-- message toolbar header -->
                            <div class="panel-menu">
                                <div class="row table-layout">
                                    <div class="col-xs-12 col-md-12 text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default light"><i class="fa fa-refresh"></i>
                                            </button>
                                            <button type="button" class="btn btn-default light"><i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-default light"><i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- message listings table -->
                            <div class="panel-body pn br-t-n">
                                <table id="message-table" class="table admin-form theme-warning tc-checkbox-1">
                                    <thead>
                                        <tr class="">
                                            <th class="text-center hidden-xs">Select</th>
                                            <th class="text-center">Date</th>
                                            <th>To</th>
                                            <th>Subject</th>
                                            <th>Content</th>
                                        </tr>   
                                    </thead>

                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach($datamessage as $datamessages)
                                        <tr class="message-unread">
                                            <td class="hidden-xs">
                                                <label class="option block mn">
                                                    <input type="checkbox" name="mobileos" value="SL">
                                                    <span class="checkbox mn"></span>
                                                </label>
                                            </td>
                                            <td class="text-right">{{$datamessages['date']}}</td>
                                            <td class="">{{$datamessages['name']}}</td>
                                            <td class="">{{$datamessages['subject']}}</td>
                                            <td class="">{{$datamessages['message']}}</td>
                                        </tr>
                                    <?php $i++;?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="panel-menu">
                                <div class="row table-layout">
                                    <div class="col-xs-12 col-md-12 text-right">
                                        <span class="hidden-xs va-m text-muted mr15"> Showing <strong>15</strong> of <strong>253</strong> </span>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default light"><i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-default light"><i class="fa fa-chevron-right"></i>
                                            </button>

                                        </div>


                                    </div>
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

    <!-- Admin Dock Quick Compose Message -->
    <div class="quick-compose-form">
        <form id="">
            <input type="text" class="form-control" id="inputUser" placeholder="User">
            <input type="text" class="form-control" id="inputSubject" placeholder="Subject">
            <div class="summernote-quick">Compose your message here...</div>
        </form>
    </div>

     <style>
    
    /* Demo only styles */
    html,
    body.admin-dock-page {
        margin-right: 0 !important;
        overflow: hidden !important;
    }
    #dock-content > div {
        display: none;
    }
    #dock-content > div.active-content {
        display: block;
    }
    #dock-content .active-content .modal-placeholder {
        position: relative;
        visibility: visible;
        display: block;
        height: 100%;
        width: 100%;
        text-align: center;
        font-size: 20px;
    }
    #dock-content .active-content .modal-placeholder:before {
        content: "It's been sent to AdminDock!";
    }
    #dock-content .active-content .modal-placeholder:after {
        content: "\f0a7";
        font-family: "FontAwesome";
        font-size: 30px;
        position: relative;
        top: 3px;
        padding-left: 20px;
        color: #999;
    }
    </style>

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    {{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
    {{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
    {{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}
    {{HTML::script('templates/theme/assets/admin-tools/admin-plugins/admin-dock/dockmodal.js')}}
    {{HTML::script('templates/theme/vendor/editors/summernote/summernote.min.js')}}
    {{HTML::script('templates/theme/assets/js/utility/utility.js')}}
    {{HTML::script('templates/theme/assets/js/main.js')}}
    {{HTML::script('templates/theme/assets/js/main.js')}}
    {{HTML::script('templates/theme/assets/js/demo.js')}}
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS    
            Demo.init();

            var msgListing = $('#message-table > tbody > tr > td');
            var msgCheckbox = $('#message-table > tbody > tr input[type=checkbox]');

            // on message table checkbox click, toggle highlighted class
            msgCheckbox.on('click', function() {
                $(this).parents('tr').toggleClass('highlight');
            });

            // on message table row click, redirect page. Unless target was a checkbox
            msgListing.not(":first-child").on('click', function(e) {

                // stop event bubble if clicked item is not a checkbox
                e.stopPropagation();
                e.preventDefault();

                // Redirect to message compose page if clicked item is not a checkbox
                window.location = "{{URL::route('dashboard-administrator-messages-compose')}}";
            });

            // On button click display quick compose message form
            $('#quick-compose').on('click', function() {

                // Admin Dock Plugin
                $('.quick-compose-form').dockmodal({
                    minimizedWidth: 260,
                    width: 470,
                    height: 480,
                    title: 'Compose Message',
                    initialState: "docked",
                    buttons: [{
                        html: "Send",
                        buttonClass: "btn btn-primary btn-sm",
                        click: function(e, dialog) {
                            // do something when the button is clicked
                            dialog.dockmodal("close");

                            // after dialog closes fire a success notification
                            setTimeout(function() {
                                msgCallback();
                            }, 500);
                        }
                    }]
                });
            });
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
        <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS     
            Demo.init();

            // Demo only javascript. no real use
            var contentType = $('#content-type');
            var Content = $('#dock-content');

            contentType.on('click', '.holder-style', function(e) {
                e.preventDefault();

                var This = $(this);
                var activeContent = This.attr('href');

                // Content button active
                contentType.find('.holder-style').removeClass('holder-active');
                This.addClass('holder-active');

                Content.children('div').removeClass('active-content');
                $(activeContent).addClass('active-content');
            });

            $('#dock-push').on('click', function() {

                var findPush = Content.children('.active-content').find('.dock-item');

                // Admin Dock Plugin
                findPush.dockmodal({
                    minimizedWidth: 220,
                    height: 430,
                    title: function() {
                        // note this is a panel specific callback
                        // will return undefined if nonexistant
                        return this.data('title');
                    },
                    initialState: "minimized"
                });

            });


        });
    </script>

</body>

</html>
