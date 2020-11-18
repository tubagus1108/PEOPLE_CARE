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
              <a href="{{route('my-dashboard')}}" class="nav-link menu-title {{request()->route()->getPrefix() == '/' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fa-home" style="font-size:20px;"></i></button><span>Dashboard</span>     
              </a>
            </li>

            {{-- Hospital --}}
            <li class="dropdown">
              <a href="{{route('hospital')}}" class="nav-link menu-title {{request()->route()->getPrefix() == '/hospital' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fa-building" style="font-size:20px;"></i></button><span>Hospital</span>     
              </a>
            </li>

            {{-- Firefighters --}}
            <li class="dropdown">
              <a href="{{route('firefighters')}}" class="nav-link menu-title {{request()->route()->getPrefix() == 'firefighters' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fa-fire-extinguisher" style="font-size:20px;"></i></button><span>Firefighter</span>     
              </a>
            </li>

            {{-- Territory --}}
            <li class="dropdown">
              <a class="nav-link menu-title {{request()->route()->getPrefix() == '/territory' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fa-map-marker" style="font-size:20px;"></i></button><span>Territory </span>
                  <div class="according-menu"></div>
              </a>
              <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/territory' ? 'block;' : 'none;' }}">
                <li><a href="{{route('province')}}" class="{{ Route::currentRouteName()=='province' ? 'active' : '' }}">Province</a></li>
                <li><a href="{{route('city')}}" class="{{ Route::currentRouteName()=='city' ? 'active' : '' }}">City</a></li>
              </ul>
            </li>

            {{-- Settings --}}
            <li class="dropdown">
              <a class="nav-link menu-title {{request()->route()->getPrefix() == '/settings' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fa-cogs" style="font-size:20px;"></i></button><span>Settings </span>
                  <div class="according-menu"></div>
              </a>
              <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/settings' ? 'block;' : 'none;' }}">
                <li><a href="{{route('employee')}}" class="{{ Route::currentRouteName()=='employee' ? 'active' : '' }}">Employee Position</a></li>
              </ul>
            </li>
            {{-- LogOut --}}
            {{-- <li class="dropdown">
              <a href="{{route('logout')}}" class="nav-link menu-title {{request()->route() == 'logout' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fa-sign-out" style="font-size:20px;"></i></button><span>Logout</span>     
              </a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
</header>