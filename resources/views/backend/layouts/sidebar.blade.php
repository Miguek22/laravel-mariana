<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
      <h3>Dashboard</h3>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Productos</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones de Producto:</h6>
            <a class="collapse-item" href="{{route('product.index')}}">Productos</a>
            <a class="collapse-item" href="{{route('product.create')}}">Agregar Productos</a>
          </div>
        </div>
    </li>

    {{-- Brands --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true" aria-controls="brandCollapse">
          <i class="fas fa-table"></i>
          <span>Marcas</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones de Marca:</h6>
            <a class="collapse-item" href="{{route('brand.index')}}">Marcas</a>
            <a class="collapse-item" href="{{route('brand.create')}}">Agregar Marcas</a>
          </div>
        </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customerCollapse" aria-expanded="true" aria-controls="customerCollapse">
        <i class="fas fa-user-circle"></i>
        <span>Clientes</span>
      </a>
      <div id="customerCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Opciones de Cliente:</h6>
          <a class="collapse-item" href="{{route('customer.index')}}">Clientes</a>
          <a class="collapse-item" href="{{route('customer.create')}}">Agregar Cliente</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#providerCollapse" aria-expanded="true" aria-controls="providerCollapse">
        <i class="fas fa-truck"></i>
        <span>Proveedores</span>
      </a>
      <div id="providerCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Opciones de Proveedor:</h6>
          <a class="collapse-item" href="{{route('providers.index')}}">Proveedores</a>
          <a class="collapse-item" href="{{route('providers.create')}}">Agregar Proveedor</a>
        </div>
      </div>
    </li>


  

    {{-- <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        Configuración General
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{route('coupon.index')}}">
          <i class="fas fa-table"></i>
          <span>Cupón</span></a>
    </li>
     <!-- Usuarios -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users"></i>
            <span>Usuarios</span></a>
    </li>
     <!-- Configuración General -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
            <span>Ajustes</span></a>
    </li>
     --}}

   
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>