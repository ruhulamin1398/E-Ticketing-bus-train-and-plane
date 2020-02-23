<!-- Sidebar -->
<ul class="navbar-nav     sidebar sidebar-dark rounded " id="accordionSidebar">

  <!-- Divider -->




  <div class="card    mb-2 bg-abasas-dark">



  <li class="nav-item  ">
            <a class="nav-link p-3 " href="{{route('admin')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

    <hr class="sidebar-divider m-1 p-0 ">

    <!-- Nav Item - Dashboard -->
  
    <li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseTicket" aria-expanded="true" aria-controls="collapseTicket">
        <i class="fas fa-fw fa-cog"></i>
        <span>Ticket </span>
      </a>
      <div id="collapseTicket" class="collapse" aria-labelledby="headingTicket" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item" href="{{route('tickets.create')}}">New Ticket</a>
          <a class="collapse-item" href="{{route('tickets.index')}}">View All</a> 

        </div>
      </div>
    </li>

    <hr class="sidebar-divider m-1 p-0 ">

    <!-- Nav Item - Dashboard -->
   
    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{route('roads.index')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Roads</span></a>
    </li>
       
    
    <hr class="sidebar-divider m-1 p-0 ">


    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{route('passengers.index')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Passengers</span></a>
    </li>
    




    <hr class="sidebar-divider m-1 p-0 ">

    <!-- Nav Item - Dashboard -->
   
    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{route('schedules.index')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Schedule</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{route('counters.index')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Counters</span></a>
    </li>


<!-- Divider -->
<hr class="sidebar-divider m-1 p-0 ">
<!-- Nav Item - Dashboard -->
<li class="nav-item  ">
  <a class="nav-link p-3 " href="{{route('seats.index')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Seats</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider m-1 p-0 ">
<!-- Nav Item - Dashboard -->
<li class="nav-item  ">
  <a class="nav-link p-3 " href="{{route('statuses.index')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Ticket Status</span></a>
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