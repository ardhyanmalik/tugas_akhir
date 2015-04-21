<header class="navbar bg-danger">
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
        <li>
            <a href="{{URL::route('homepage')}}" class="dropdown-toggle fw600 p15">
                <span>HomePage</span>
            </a>
        </li>
        <li>
            <a href="{{URL::route('product-list')}}" class="dropdown-toggle fw600 p15">
                <span>Products</span>
            </a>
        </li>
        <li>
            <a href="#" class="dropdown-toggle fw600 p15">
                <span>About Us</span>
            </a>
        </li>
        <li>
            <a href="#" class="dropdown-toggle fw600 p15">
                <span>FAQ</span>
            </a>
        </li>
        @if(Auth::check())
            <li class="dropdown">
                <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                    <span>{{Auth::user()->name}}</span>
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
                <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        @if(Auth::user()->role_id==1)
                            <li class="of-h">
                                <a href="{{URL::route('dashboard-administrator')}}" class="fw600 p12 animated animated-short fadeInUp">
                                    <span class="fa fa-dashboard pr5"></span> Dashboard
                                </a>
                            </li>
                        @elseif(Auth::user()->role_id==2)
                            <li class="of-h">
                                <a href="{{URL::route('dashboard-moderator')}}" class="fw600 p12 animated animated-short fadeInUp">
                                    <span class="fa fa-dashboard pr5"></span> Dashboard
                                </a>
                            </li>
                        @elseif(Auth::user()->role_id==3)
                            <li class="of-h">
                                <a href="{{URL::route('dashboard-contributor')}}" class="fw600 p12 animated animated-short fadeInUp">
                                    <span class="fa fa-dashboard pr5"></span> Dashboard
                                </a>
                            </li>
                        @elseif(Auth::user()->role_id==4)
                            <li class="of-h">
                                <a href="{{URL::route('dashboard-guest')}}" class="fw600 p12 animated animated-short fadeInUp">
                                    <span class="fa fa-dashboard pr5"></span> Dashboard
                                </a>
                            </li>
                        @elseif(Auth::user()->role_id==5)
                            <li class="of-h">
                                <a href="{{URL::route('dashboard-sales')}}" class="fw600 p12 animated animated-short fadeInUp">
                                    <span class="fa fa-dashboard pr5"></span> Dashboard
                                </a>
                            </li>
                        @else(Auth::user()->role_id==6)
                            <li class="of-h">
                                <a href="{{URL::route('dashboard-payment')}}" class="fw600 p12 animated animated-short fadeInUp">
                                    <span class="fa fa-dashboard pr5"></span> Dashboard
                                </a>
                            </li>
                        @endif
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
        @else
            <li>
               <a href="{{URL::route('account-sign-in')}}" class="dropdown-toggle fw600 p15">
                   <span>Sign-in |Sign-up</span>
               </a>
            </li>
        @endif

    </ul>
</header>