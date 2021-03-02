  <div>
      <!-- ========== Left Sidebar Start ========== -->
      <div class="left side-menu">
          <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
              <i class="mdi mdi-close"></i>
          </button>

          <div class="left-side-logo d-block d-lg-none">
              <div class="text-center">

                  <a href="index.html" class="logo"><img src="{{ asset('admin/assets/images/logo_dark.png') }}" height="20" alt="logo"></a>
              </div>
          </div>

          <div class="sidebar-inner slimscrollleft">

              <div id="sidebar-menu">
                  <ul>
                      <li class="menu-title">Main</li>

                      <li>
                          <a href="{{ route('admin.dashboard')}}" class="waves-effect">
                              <i class="dripicons-home"></i>
                              <span> Dashboard <span class="badge badge-success badge-pill float-right">3</span></span>
                          </a>
                      </li>
                      <li class="has_sub">
                          <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-location"></i><span> Subject</a>
                          <ul class="list-unstyled">
                              <li><a href="{{route('admin.category')}}">Subject</a></li>
                          </ul>
                      </li>
                      <li class="has_sub">
                          <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-location"></i><span> Exams</a>
                          <ul class="list-unstyled">
                              <li><a href="{{route('admin.exam')}}">Exam</a></li>
                          </ul>
                      </li>
                      <li class="menu-title">Extra</li>
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div> <!-- end sidebarinner -->
      </div>
      <!-- Left Sidebar End -->
  </div>