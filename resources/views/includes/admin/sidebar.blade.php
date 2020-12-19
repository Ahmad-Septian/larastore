 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
      </div>
      <div class="sidebar-brand-text mx-3">Larastore Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{route('kategori')}}">
        <i class="fas fa-align-justify"></i>
        <span>Kategori</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{route('product')}}">
        <i class="fas fa-tshirt"></i>
        <span>Product</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{route('pesanan')}}">
        <i class="fas fa-dollar-sign"></i>
        <span>Pesanan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
