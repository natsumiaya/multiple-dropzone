<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fas fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li><form method="post" action="{{ url('logout') }}" id="logout-form">
                {{ csrf_field() }}
              </form><a href="javascript:;" onclick="document.getElementById('logout-form').submit();"><i class="fas  fa-sign-out-alt"></i> Log Out</a></li>
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Username
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>