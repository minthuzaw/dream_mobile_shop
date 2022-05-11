<!-- Heading -->
<div class="sidebar-heading">
    Admin Dashboard
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
       aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Employee Management</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employee Management:</h6>
            <a class="collapse-item" href="{{route('users.index')}}">View Employee</a>
            <a class="collapse-item" href="{{route('users.create')}}">Create New Employee</a>
            <div class="collapse-divider"></div>

        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
