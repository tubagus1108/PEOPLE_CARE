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

            {{-- Hospitals --}}
            <li class="dropdown">
              <a href="{{route('hospitals')}}" class="nav-link menu-title {{request()->route()->getPrefix() == 'hospitals' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fa-building" style="font-size:20px;"></i></button><span>Hospitals</span>     
              </a>
            </li>

            {{-- Firefighters --}}
            <li class="dropdown">
              <a href="{{route('hospitals')}}" class="nav-link menu-title {{request()->route()->getPrefix() == 'hospitals' ? 'active' : '' }}" href="#"><button class="btn p-0 mr-2" style="background: none; width:30px; text-align:left; !important; border:none;"><i class="fa fire-extinguisher" style="font-size:20px;"></i></button><span>Firefighter</span>     
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
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
    </nav>
</header>