<!-- Sidebar -->
<ul class="navbar-nav     sidebar sidebar-dark rounded " id="accordionSidebar">

    <!-- Divider -->




    <div class="card    mb-2 bg-abasas-dark">




        @if(!Auth::guest())

        @if(Auth::User()->role_id ==1 )
        <li class="nav-item  ">
            <a class="nav-link p-3 " href="{{route('admin')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        @else

        <a class="nav-link p-3 " href="{{route('passengers.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        @endif

        <hr class="sidebar-divider m-1 p-0 ">

        @endif


        <!-- Nav Item - Dashboard -->

        <li class="nav-item  ">
            <a class="nav-link p-3 " href="{{route('index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bus</span></a>
        </li>

        <hr class="sidebar-divider m-1 p-0 ">

        <!-- Nav Item - Dashboard -->

        <li class="nav-item  ">
            <a class="nav-link p-3 " href="">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Train</span></a>
        </li>


        <hr class="sidebar-divider m-1 p-0 ">


        <li class="nav-item  ">
            <a class="nav-link p-3 " href="">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Plane</span></a>
        </li>






        <!-- Divider -->
        <hr class="sidebar-divider m-1 p-0 ">
        <!-- Nav Item - Dashboard -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center  d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </div>


</ul>
<!-- End of Sidebar -->