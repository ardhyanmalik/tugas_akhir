<header class="navbar navbar-fixed-top bg-danger">
    <div class="navbar-branding bg-danger dark">
        <a class="navbar-brand" href="#"> <b>TEL</b>US </a>
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
        <li class="hidden-xs">
            <a class="request-fullscreen toggle-active" href="#">
                <span class="octicon octicon-screen-full fs18"></span>
            </a>
        </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            @if(Auth::user()->user_photo==null)
                <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="{{ URL::asset('assets/default_pict.png') }}" alt="avatar" class="mw30 br64 mr15">
                    <span>{{Auth::user()->name}}</span>
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
            @endif
            @if(Auth::user()->user_photo!=null)
                <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="{{Auth::user()->user_photo}}" alt="avatar" class="mw30 br64 mr15">
                    <span>{{Auth::user()->name}}</span>
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
            @endif
            <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                <li class="of-h">
                    <a href="{{URL::route('homepage')}}" class="fw600 p12 animated animated-short fadeInUp">
                        <span class="fa fa-home pr5"></span> Homepage
                    </a>
                </li>
                <li class="br-t of-h">
                    <a href="{{URL::route('users-profile')}}" class="fw600 p12 animated animated-short fadeInUp">
                        <span class="fa fa-user pr5"></span> Profile
                    </a>
                </li>
                <li class="br-t of-h">
                    <a href="{{URL::route('logout')}}" class="fw600 p12 animated animated-short fadeInDown">
                        <span class="fa fa-power-off pr5"></span> Logout </a>
                </li>
            </ul>
        </li>
    </ul>
</header>