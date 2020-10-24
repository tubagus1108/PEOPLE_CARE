<header class="main-nav">
    <div class="logo-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>
    <div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
    <nav>
      <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="mainnav">
          <ul class="nav-menu custom-scrollbar">
            <li class="back-btn">
              <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
            </li>
            <li class="dropdown">
              <a class="nav-link menu-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="home"></i><span>Dashboard</span>
                  <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
              </a>
              <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
                <li><a href="{{route('index')}}" class="{{ Route::currentRouteName()=='index' ? 'active' : '' }}">Default</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="nav-link menu-title {{request()->route()->getPrefix() == '/starter-kit' ? 'active' : '' }}" href="#"><i data-feather="file-text"></i><span>Starter Kit</span>
                  <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/starter-kit' ? 'down' : 'right' }}"></i></div>
              </a>
              <ul class="nav-submenu menu-content" style="display: {{request()->route()->getPrefix() == '/starter-kit' ? 'block;' : 'none;' }}">
                <li>
                  <a class="submenu-title {{ in_array(Route::currentRouteName(), ['layout-light', 'layout-dark']) ? 'active' : '' }}" href="#">Color Version
                    <div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['layout-light', 'layout-dark']) ? 'down' : 'right' }}"></i></div>
                  </a>
                  <ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['layout-light', 'layout-dark']) ? 'block;' : 'none;' }}">
                    <li><a href="{{route('layout-light')}}" class="{{ Route::currentRouteName()=='layout-light' ? 'active' : '' }}">Layout Light</a></li>
                    <li><a href="{{route('layout-dark')}}" class="{{ Route::currentRouteName()=='layout-dark' ? 'active' : '' }}">Layout Dark</a></li>
                  </ul>
                </li>
                <li>
                  <a class="submenu-title {{ in_array(Route::currentRouteName(), ['hide-on-scroll']) ? 'active' : '' }}" href="{{route('hide-on-scroll')}}">Hide On Scroll
                  </a>
                </li>
                <li>
                  <a class="submenu-title {{ in_array(Route::currentRouteName(), ['layout-box', 'layout-rtl', 'compact-layout', 'vertical-layout', 'dark-rtl-layout', 'vertical-rtl-layout', 'compact-rtl-layout', 'dark-box-layout', 'vertical-box-layout', 'compact-dark-layout']) ? 'active' : '' }}" href="#">Page layout
                    <div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['layout-box', 'layout-rtl', 'compact-layout', 'vertical-layout', 'dark-rtl-layout','vertical-rtl-layout', 'compact-rtl-layout', 'dark-box-layout', 'vertical-box-layout', 'compact-dark-layout']) ? 'down' : 'right' }}"></i></div>
                  </a>
                  <ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['layout-box', 'layout-rtl', 'compact-layout', 'vertical-layout', 'dark-rtl-layout', 'vertical-rtl-layout', 'compact-rtl-layout', 'dark-box-layout', 'vertical-box-layout', 'compact-dark-layout']) ? 'block;' : 'none;' }}">
                      <li><a href="{{route('layout-box')}}" class="{{ Route::currentRouteName()=='layout-box' ? 'active' : '' }}">Layout-box</a></li>
                    <li><a href="{{route('layout-rtl')}}" class="{{ Route::currentRouteName()=='layout-rtl' ? 'active' : '' }}">Layout RTL</a></li>
                    <li><a href="{{route('compact-layout')}}" class="{{ Route::currentRouteName()=='compact-layout' ? 'active' : '' }}">Compact Layout</a></li>  
                    <li><a href="{{route('vertical-layout')}}" class="{{ Route::currentRouteName()=='vertical-layout' ? 'active' : '' }}">Vertical Layout</a></li>
                    <li><a href="{{route('dark-rtl-layout')}}" class="{{ Route::currentRouteName()=='dark-rtl-layout' ? 'active' : '' }}">Dark & RTL Layout</a></li>
                    <li><a href="{{route('vertical-rtl-layout')}}" class="{{ Route::currentRouteName()=='vertical-rtl-layout' ? 'active' : '' }}">Vertical & RTL Layout</a></li>
                    <li><a href="{{route('compact-rtl-layout')}}" class="{{ Route::currentRouteName()=='compact-rtl-layout' ? 'active' : '' }}">Compact & RTL Layout</a></li>
                    <li><a href="{{route('dark-box-layout')}}" class="{{ Route::currentRouteName()=='dark-box-layout' ? 'active' : '' }}">Dark & Box Layout</a></li>
                    <li><a href="{{route('vertical-box-layout')}}" class="{{ Route::currentRouteName()=='vertical-box-layout' ? 'active' : '' }}">Vetical Box Layout</a></li>
                    <li><a href="{{route('compact-dark-layout')}}" class="{{ Route::currentRouteName()=='compact-dark-layout' ? 'active' : '' }}">Compact & Dark Layout</a></li>
                  </ul>
                </li>
                <li>
                    <a class="submenu-title {{ in_array(Route::currentRouteName(), ['footer-light', 'footer-dark', 'footer-fixed']) ? 'active' : '' }}" href="#">Footers
                       <div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['footer-light', 'footer-dark', 'footer-fixed']) ? 'down' : 'right' }}"></i></div>
                    </a>
                    <ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['footer-light', 'footer-dark', 'footer-fixed']) ? 'block;' : 'none;' }}">
                       <li><a href="{{route('footer-light')}}" class="{{ Route::currentRouteName()=='footer-light' ? 'active' : '' }}">Footer Light</a></li>
                       <li><a href="{{route('footer-dark')}}" class="{{ Route::currentRouteName()=='footer-dark' ? 'active' : '' }}">Footer Dark</a></li>
                       <li><a href="{{route('footer-fixed')}}" class="{{ Route::currentRouteName()=='footer-fixed' ? 'active' : '' }}">Footer Fixed</a></li>
                    </ul>
                 </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
    </nav>
</header>