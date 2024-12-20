<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="/back/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/back/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('add.service')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Service
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('serviceList')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Service Data
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('bookingList')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Booking Data
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{route('addproduct')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ProductList')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('orderList')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Order List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('addTeam')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                AD Team
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('teamList')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                All Team Member
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ContactList')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contuct
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>