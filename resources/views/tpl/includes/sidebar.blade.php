<!-- Sidebar -->
<ul class="navbar-nav bg-dark-color  sidebar sidebar-dark accordion sidebar-toggled " id="accordionSidebar">

@if(Auth::user()->role_id == 4 || Auth::user()->role_id == 6 || Auth::user()->role_id == 8)
     <li class="nav-item  ">
        <a class="nav-link p-3 " href="{{ route('tpl.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Vehicle </span></a>
    </li> 
    <hr class="sidebar-divider m-1 p-0 ">
    <li class="nav-item  ">
        <a class="nav-link p-3 " href="{{ route('tpl-seats.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Seats</span></a>
    </li>      


@else
    <li class="nav-item  ">
        <a class="nav-link p-3 " href="{{ route('tpl-schedule.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Schedule</span></a>
    </li>   

    <hr class="sidebar-divider m-1 p-0 ">
    <li class="nav-item  ">
        <a class="nav-link p-3 " href="{{ route('tpl-counter-all-ticket.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>All Tickets</span></a>
    </li>   
    
    @endif
    {{-- 
        <hr class="sidebar-divider m-1 p-0 ">
    <li class="nav-item">
        <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapsePurchase" aria-expanded="true" aria-controls="collapsePurchase">
            <i class="fas fa-fw fa-cog"></i>
            <span>Committee</span>
        </a>
        <div id="collapsePurchase" class="collapse" aria-labelledby="headingPurchase" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="">Committee </a>
                <a class="collapse-item" href="">Add Committee </a>
                <a class="collapse-item" href="">Designation </a>
                <a class="collapse-item" href="">Session </a>

            </div>
        </div>
    </li> --}}
  
    
    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center  d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
