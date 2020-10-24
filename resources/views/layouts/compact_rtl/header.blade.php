<div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>
    </div>
    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"></i></div>
    <div class="left-menu-header col">
      <ul>
        <li>
          <form class="form-inline search-form">
            <div class="search-bg"><i class="fa fa-search"></i></div>
            <input class="form-control-plaintext" placeholder="Search here.....">
          </form>
          <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
        </li>
      </ul>
    </div>
    <div class="nav-right col pull-right right-menu">
      <ul class="nav-menus">
        <li class="onhover-dropdown">
          <div class="notification-box"><i data-feather="bell"></i><span class="badge badge-pill badge-secondary">2</span></div>
          <ul class="notification-dropdown onhover-show-div">
            <li>
              <p class="f-w-600 font-roboto">You have 3 notifications</p>
            </li>
            <li>
              <p class="mb-0"><i class="fa fa-circle-o mr-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
            </li>
            <li>
              <p class="mb-0"><i class="fa fa-circle-o mr-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
            </li>
            <li>
              <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
            </li>
            <li>
              <p class="mb-0"><i class="fa fa-circle-o mr-3 font-warning"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
            </li>
          </ul>
        </li>
        <li class="onhover-dropdown">
          <i data-feather="message-square"></i>
          <ul class="chat-dropdown onhover-show-div p-t-15 p-b-15">
            <li>
              <div class="media">
                <img class="img-fluid rounded-circle mr-3" src="{{asset('assets/images/user/1.jpg')}}" alt="">
                <div class="status-circle away"></div>
                <div class="media-body">
                  <span>Erica Hughes</span>
                  <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                </div>
                <p class="f-12 font-warning">58 mins ago</p>
              </div>
            </li>
            <li>
              <div class="media">
                <img class="img-fluid rounded-circle mr-3" src="{{asset('assets/images/user/2.jpg')}}" alt="">
                <div class="status-circle online"></div>
                <div class="media-body">
                  <span>Kori Thomas</span>
                  <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                </div>
                <p class="f-12 font-success">1 hr ago</p>
              </div>
            </li>
            <li>
              <div class="media">
                <img class="img-fluid rounded-circle mr-3" src="{{asset('assets/images/user/4.jpg')}}" alt="">
                <div class="status-circle offline"></div>
                <div class="media-body">
                  <span>Ain Chavez</span>
                  <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                </div>
                <p class="f-12 font-danger">32 mins ago</p>
              </div>
            </li>
            <li class="text-center"> <a href="#">View All     </a></li>
          </ul>
        </li>
        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li class="onhover-dropdown p-0">
          <div class="media profile-media">
            <img class="b-r-10" src="{{asset('assets/images/dashboard/profile.jpg')}}" alt="">
            <div class="media-body">
              <span>Emay Walter</span>
              <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <li><i data-feather="user"></i><span>Account </span></li>
            <li><i data-feather="mail"></i><span>Inbox</span></li>
            <li><i data-feather="file-text"></i><span>Taskboard</span></li>
            <li><i data-feather="settings"></i><span>Settings</span></li>
            <li><i data-feather="log-in"> </i><span>Log in</span></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
  </div>
</div>