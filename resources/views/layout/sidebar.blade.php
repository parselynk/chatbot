<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Tickets</li>

            <li class="nav-item">
                <a href="/" class="nav-link {{ Request::is('/') ? 'active':' ' }}">
                    <i class="icon icon-speedometer"></i> Dashboard
                </a>
            </li>
    @hasanyrole('super admin|admin')
            <li class="nav-title">Users</li>

            <li class="nav-item">
                <a href="/user" class="nav-link {{ Request::is('user') ? 'active':' ' }}">
                    <i class="icon icon-user"></i> Users 
                </a>
            </li>
        @hasanyrole('super admin')

            <li class="nav-item">
                <a href="/register" class="nav-link {{ Request::is('register') ? 'active':' ' }} ">
                    <i class="icon icon-user-follow"></i> Create user 
                </a>
            </li>
        @endhasanyrole
    @endhasanyrole
        </ul>
    </nav>
</div>