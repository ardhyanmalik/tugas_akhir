<aside id="sidebar_left" class="sidebar-dark nano nano-primary">
    <div class="nano-content"> 
        <!-- sidebar menu -->
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>
            <li>
                <a href="{{URL::route('dashboard-administrator')}}">
                    <span class="glyphicons glyphicons-dashboard"></span>
                    <span class="sidebar-title">Dashboard</span>
                </a>
                <a href="{{URL::route('administrator-account-setting')}}">
                    <span class="glyphicons glyphicons-settings"></span>
                    <span class="sidebar-title">Account Setting</span>
                </a>
            </li>

            <li class="sidebar-label pt15">Manage Message</li>
            <li>
                <a class="accordion-toggle" href="{{URL::route('dashboard-administrator-messages-inbox')}}">
                    <span class="glyphicons glyphicons-envelope"></span>
                    <span class="sidebar-title">Messages</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{URL::route('dashboard-administrator-messages-compose')}}">
                            <span class="glyphicons glyphicons-envelope"></span> Compose Messages </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-messages-inbox')}}">
                            <span class="glyphicons glyphicons-envelope"></span> Inbox </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-messages-sendbox')}}">
                            <span class="glyphicons glyphicons-envelope"></span> Sentbox </a>
                    </li>
                </ul>

            </li>

            <li class="sidebar-label pt15">Manage Users</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-adress_book"></span>
                    <span class="sidebar-title">Data Master Users</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{URL::route('dashboard-administrator-datamaster-admin')}}">
                            <span class="fa fa-user"></span> Administrator </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-datamaster-moderator')}}">
                            <span class="fa fa-user"></span> Moderator </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-datamaster-contributor')}}">
                            <span class="fa fa-user"></span> Contributor </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-datamaster-sales')}}">
                            <span class="fa fa-user"></span> Sales </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-datamaster-payment')}}">
                            <span class="fa fa-user"></span> Payment </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-datamaster-guest')}}">
                            <span class="fa fa-user"></span> Guest </a>
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
                        <a href="{{URL::route('dashboard-administrator-categories-list')}}">
                            <span class="fa fa-list-alt"></span> Categories List </a>
                    </li>
                    <li>
                        <a href="{{URL::route('dashboard-administrator-product-list')}}">
                            <span class="fa fa-book"></span> Products List </a>
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