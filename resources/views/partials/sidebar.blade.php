<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-chart-line"></i> {{-- Ganti ikon sesuai identitas kamu --}}
    </div>
    <div class="sidebar-brand-text mx-3">Astronacci <sup>Tech</sup></div>
</a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard Link -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

     <!-- Sidebar Toggler (Sidebar) -->
    <!-- Sidebar Toggler -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


    <!-- Tambah menu lainnya -->
</ul>
