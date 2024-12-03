<!-- Sidebar -->
<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="white">
        <a href="" class="logo">
          <img
            src="{{ asset('assets/img/lion-logo.png') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="100"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          @if(auth()->user()->role === 'engineer')
          <li class="nav-item {{ Route::is('form') ? 'active' : '' }}">
            <a href="{{ route('form') }}">
              <i class="fas fa-pen"></i>
              <p>Form</p>
            </a>
          </li>
          {{-- <li class="nav-item {{ Route::is('status') ? 'active' : '' }}">
            <a href="{{ route('status') }}">
              <i class="fas fa-clock"></i>
              <p>Status</p>
            </a>
          </li> --}}
          @endif
          @if(auth()->user()->role === 'coordinator')
          <li class="nav-item {{ Route::is('coordinator') ? 'active' : '' }}">
            <a href="{{ route('coordinator') }}">
              <i class="fas fa-layer-group"></i>
              <p>Dashboard</p>
            </a>
          </li>
          {{-- <li class="nav-item {{ Route::is('status') ? 'active' : '' }}">
            <a href="{{ route('status') }}">
              <i class="fas fa-clock"></i>
              <p>Status</p>
            </a>
          </li> --}}
          @endif
          @if(auth()->user()->role === 'inspector')
          <li class="nav-item {{ Route::is('inspector') ? 'active' : '' }}">
            <a href="{{ route('inspector') }}">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          {{-- <li class="nav-item {{ Route::is('status') ? 'active' : '' }}">
            <a href="{{ route('status') }}">
              <i class="fas fa-clock"></i>
              <p>Status</p>
            </a>
          </li> --}}
          @endif
          @if(auth()->user()->role === 'admin')
          <li class="nav-item {{ Route::is('status') ? 'active' : '' }}">
            <a href="{{ route('status') }}">
              <i class="fas fa-clock"></i>
              <p>Status</p>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->