<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{url('image/sidebar.jpg')}}">
    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-normal">
            <img src="{{ url('image/logo.png') }}" width="36.4px" />
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('storages') || Request::is('storages/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('storages') }}">
                    <i class="material-icons">store</i>
                    <p>Storage</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('account') || Request::is('account/*') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('account')}}">
                    <i class="material-icons">supervisor_account</i>
                    <p>Account</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('profile') || Request::is('profile/*') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('profile')}}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
        </ul>
    </div>
</div>
