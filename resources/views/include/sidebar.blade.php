<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">PPDB 2021</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Management</li>
          @if (Auth::user()->role->nama == 'admin')
          <li class="nav-item {{ Request::is('/role') ? 'active' : '' }}">
            <a href="{{ route('role.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Role</span></a>
        </li>
        <li class="nav-item {{ Request::is('/role') ? 'active' : '' }}">
            <a href="{{ route('jurusan.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Jurusan</span></a>
        </li>
        <li class="nav-item {{ Request::is('/role') ? 'active' : '' }}">
            <a href="{{ route('smp.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Smp</span></a>
        </li>
          @endif
        <li class="nav-item {{ Request::is('/role') ? 'active' : '' }}">
            <a href="{{ route('pendaftaran.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Pendaftaran</span></a>
        </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div>
    </aside>
  </div>