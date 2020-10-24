<header class="main-nav">
    <div class="logo-wrapper"><a href="{{route('my-dashboard')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>
    <div class="logo-icon-wrapper"><a href="{{route('my-dashboard')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
    <nav>
      <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div> 
        <div id="mainnav">
          <ul class="nav-menu custom-scrollbar">
            <li class="back-btn">
              <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
            </li>

            {{-- Dashboard --}}
            <li class="dropdown">
              <a class="nav-link menu-title {{request()->route()->getPrefix() == '/' ? 'active' : '' }}" href="#"><i data-feather="home"></i><span>Dashboard</span>
                  <div class="according-menu"></div>
              </a>
              <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/' ? 'block;' : 'none;' }}">
                <li><a href="{{route('my-dashboard')}}" class="{{ Route::currentRouteName()=='my-dashboard' ? 'active' : '' }}">My Dashboard</a></li>
              </ul>
            </li>

            {{-- Territory --}}
            <li class="dropdown">
              <a class="nav-link menu-title {{request()->route()->getPrefix() == 'territory' ? 'active' : '' }}" href="#"><i data-feather="flag"></i><span>Territory</span>
                  <div class="according-menu"></div>
              </a>
              <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == 'territory' ? 'block;' : 'none;' }}">
                <li><a href="{{route('province')}}" class="{{ Route::currentRouteName()=='province' ? 'active' : '' }}">Province</a></li>
                <li><a href="{{route('city')}}" class="{{ Route::currentRouteName()=='city' ? 'active' : '' }}">City</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
    </nav>
</header>