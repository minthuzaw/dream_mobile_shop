<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DMS Admin</div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ Auth::user()->isAdmin() ? route('users.index') : route('phones.index') }}">

            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands"
           aria-expanded="true" aria-controls="collapseBrands">
            <i class="fas fa-fw fa-cog"></i>
            <span>Brands</span>
        </a>
        <div id="collapseBrands" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if(Auth::user()->isCashier())
                <a class="collapse-item" href="{{route('brands.index')}}">View Brands</a>
                @else
                <a class="collapse-item" href="{{route('brands.create')}}">Add New Brands</a>
                @endif

            </div>
        </div>

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products:</h6>
                @if(Auth::user()->isCashier())
                <a class="collapse-item" href="{{ route('phones.index') }}">View Products</a>
                @else
                <a class="collapse-item" href="{{route('phones.create')}}">Add New Products</a>
                @endif

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if(Auth::user()->isAdmin())

        <x-admin-sidebar/>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->

    <div class="text-center d-flex h-100 justify-content-center">
        <div class="align-self-end pb-5">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </div>

</ul>
<!-- End of Sidebar -->
