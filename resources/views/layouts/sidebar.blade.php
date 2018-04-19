<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{URL::to('/')}}" class="site_title"><i class="fas  fa-paw"></i> <span></span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>John Doe</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li><a><i class="fas fa-box-open"></i> Received Package <span class="fas fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{URL::to('/add-package')}}">New Received Package</a></li>
              <li><a href="{{URL::to('/list-package')}}">Received Package List</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>