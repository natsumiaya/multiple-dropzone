<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{URL::to('/')}}" class="site_title"><i class="fas fa-box-open"></i> <span>Package!</span></a>
    </div>

    <div class="clearfix"></div>

    

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li class="active"><a><i class="fas fa-box-open"></i> Received Package <span class="fas fa-chevron-down"></span></a>
            <ul class="nav child_menu stay-open">
              <li><a href="{{URL::to('addpackage')}}">New Received Package</a></li>
              <li><a href="{{URL::to('listpackage')}}">Received Package List</a></li>
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