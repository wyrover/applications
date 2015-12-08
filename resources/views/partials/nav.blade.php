<div class="nav-side-menu">
    <div class="brand">
        @if (! empty(Auth::user()->company->logo))
            <img src="uploads/{!! Auth::user()->company->logo !!}" width="100">
        @endif
    </div>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a href="/dashboard">
                    <i class="fa fa-dashboard fa-lg"></i> Dashboard
                </a>
            </li>
            <li class="{{ Request::is('applications') ? 'active' : '' }}"><a href="/applications"><i class="fa fa-briefcase fa-lg"></i> Applications</a></li>
            <li class="{{ Request::is('references') ? 'active' : '' }}"><a href="/references"><i class="fa fa-file-text fa-lg"></i> References</a></li>
            <li class="{{ Request::is('settings') ? 'active' : '' }}"><a href="/settings"><i class="fa fa-cogs fa-lg"></i> Settings</a></li>
            @if (Auth::check() && Auth::user()->role == 'Admin')
            <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="/users"><i class="fa fa-users fa-lg"></i> Users</a></li>
            @endif
            <li class="{{ Request::is('profile') ? 'active' : '' }}"><a href="/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            @if (Auth::check())
            <li><a href="/auth/logout"><i class="fa fa-power-off fa-lg"></i> Logout</a></li>
            @endif
            {{--<li  data-toggle="collapse" data-target="#products" class="collapsed active">--}}
                {{--<a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>--}}
            {{--</li>--}}
            {{--<ul class="sub-menu collapse" id="products">--}}
                {{--<li class="active"><a href="#">CSS3 Animation</a></li>--}}
                {{--<li><a href="#">General</a></li>--}}
                {{--<li><a href="#">Buttons</a></li>--}}
                {{--<li><a href="#">Tabs & Accordions</a></li>--}}
                {{--<li><a href="#">Typography</a></li>--}}
                {{--<li><a href="#">FontAwesome</a></li>--}}
                {{--<li><a href="#">Slider</a></li>--}}
                {{--<li><a href="#">Panels</a></li>--}}
                {{--<li><a href="#">Widgets</a></li>--}}
                {{--<li><a href="#">Bootstrap Model</a></li>--}}
            {{--</ul>--}}

        </ul>
    </div>
</div>