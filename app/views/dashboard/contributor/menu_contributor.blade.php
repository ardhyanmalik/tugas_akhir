<aside id="sidebar_left" class="sidebar-dark nano nano-primary">
    <div class="nano-content"> 
        <!-- sidebar menu -->
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>
            <li>
                <a href="{{URL::route('dashboard-contributor')}}">
                    <span class="glyphicons glyphicons-dashboard"></span>
                    <span class="sidebar-title">Dashboard</span>
                </a>
                <a href="{{URL::route('contributor-account-setting')}}">
                    <span class="glyphicons glyphicons-settings"></span>
                    <span class="sidebar-title">Account Setting</span>
                </a>
            </li>

            <li class="sidebar-label pt15">Manage Message</li>
            <li>
                <a class="accordion-toggle" href="{{URL::route('dashboard-contributor-messages-inbox')}}">
                    <span class="glyphicons glyphicons-envelope"></span>
                    <span class="sidebar-title">Messages</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{URL::route('dashboard-contributor-messages-compose')}}">
                            <span class="glyphicons glyphicons-envelope"></span> Compose Messages </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-contributor-messages-inbox')}}">
                            <span class="glyphicons glyphicons-envelope"></span> Inbox </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-contributor-messages-sendbox')}}">
                            <span class="glyphicons glyphicons-envelope"></span> Sentbox </a>
                    </li>
                </ul>

            </li>

            <li class="sidebar-label pt15">TEL_US Contents</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">Manage Products</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="#">
                            <span class="fa fa-bar-chart-o"></span> Overview </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-contributor-ownproduct')}}">
                            <span class="fa fa-check-circle"></span> Own Product </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-contributor-product-status')}}">
                            <span class="fa fa-book"></span> Products Status </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-contributor-manageproduct-reversioning')}}">
                            <span class="fa fa-refresh"></span> Reversioning </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-contributor-manageproduct-reversioning-status')}}">
                            <span class="fa fa-exclamation-circle"></span> Reversioning Approval</a>
                    </li>

                </ul>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-qrcode"></span>
                    <span class="sidebar-title">Manage Sales</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{URL::route('dashboard-contributor-manageproduct-purchased-approval')}}">
                            <span class="fa fa-suitcase"></span> Purchase Product </a>
                    </li>
                </ul>
            </li>

            <div class="sidebar-toggle-mini">
                <a href="#">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>
        </ul>
    </div>
</aside>