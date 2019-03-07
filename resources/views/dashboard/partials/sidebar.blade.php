<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">RTGNetwork</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <li class="nav-item {{ Request::routeIs('dashboard.videos') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.videos') }}">
            <i class="fas fa-fw fa-video"></i>
            <span>All Videos</span></a>
    </li>

    <li class="nav-item {{ Request::routeIs('dashboard.videos.add') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.videos.add') }}">
            <i class="fas fa-fw fa-plus"></i>
            <span>Add Video</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->