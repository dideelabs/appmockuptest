<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My Mockup Test</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            @if(auth()->user()->role == 'admin')
            <a href="{{ route('biodata.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Pelamar
              </p>
            </a>
            @else
            <a href="{{ route('home') }}" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Biodata Diri
              </p>
            </a>
            @endif
          </li>

          @if(auth()->user()->role == 'admin')
          <li class="nav-header">ADMINISTRATOR</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-cog nav-icon"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>