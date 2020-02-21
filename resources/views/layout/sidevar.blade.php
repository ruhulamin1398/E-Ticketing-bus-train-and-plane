<!-- Sidebar -->
<ul class="navbar-nav    sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Divider -->




  <div class="card    mb-2 bg-abasas-dark">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
      <a class="nav-link p-3 " href="{{ route('index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>হোম পেইজ</span></a>
    </li>
    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Product Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
        <i class="fas fa-fw fa-cog  "></i>
        <span>পণ্য</span>
      </a>
      <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item" href="{{ route('products.index') }}">পণ্য সমূহ</a>
          <a class="collapse-item" href="{{ route('products.create') }}">নতুন পণ্য</a>
          <a class="collapse-item" href="{{ route('categories.store') }}">ক্যাটাগরি</a>
          <a class="collapse-item" href="{{ route('product_type.index') }}">বিক্রয়ের ধরন</a>
          <a class="collapse-item" href=" {{ route('order_return_product.index') }}">পণ্য ফেরত</a>
        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">

    <!--sell -->

    <li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseSell" aria-expanded="true" aria-controls="collapseSell">
        <i class="fas fa-fw fa-cog"></i>
        <span>পণ্য বিক্রয়</span>
      </a>
      <div id="collapseSell" class="collapse" aria-labelledby="headingSell" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item" href="{{ route('orders.create') }}">বিক্রয় করুন </a></a>
          <a class="collapse-item" href="{{ route('orders.index') }}">বিক্রয় লিস্ট </a>

        </div>
      </div>
    </li>


  <!--sell -->
    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">

<!--purchase -->
<li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapsePurchase" aria-expanded="true" aria-controls="collapsePurchase">
        <i class="fas fa-fw fa-cog"></i>
        <span>পণ্য ক্রয়</span>
      </a>
      <div id="collapsePurchase" class="collapse" aria-labelledby="headingPurchase" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item" href="{{ route('purchases.create') }}">পণ্য ক্রয় করুন </a>
          <a class="collapse-item" href="{{ route('purchases.index') }}">ক্রয়ের লিস্ট </a>

        </div>
      </div>
    </li>


<!--purchase -->

  </div>
  <!-- ///////////////////////////////////////////////////////////////////////////////////// -->
  <div class="card  mb-2 bg-abasas-dark ">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{ route('customers.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>কাস্টমার</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">

    <!--supplier  Collapse Menu -->
    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{ route('suppliers.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span> সাপ্লাইয়ার</span></a>
    </li>


    @if(Auth::user()->role_id==1)
    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">

    <!--Category  Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseStaff" aria-expanded="true" aria-controls="collapseStaff">
        <i class="fas fa-fw fa-cog"></i>
        <span>কর্মচারী </span>
      </a>
      <div id="collapseStaff" class="collapse" aria-labelledby="headingStaff" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('staffs.index')}}">কর্মচারী লিস্ট</a>
          <a class="collapse-item" href="{{{route('salaries.index')}}}">বেতন</a>

        </div>
      </div>
    </li>
@endif

    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{ route('barcode') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>কোড প্রিন্ট  </span></a>
    </li>

  </div>
  <!-- ///////////////////////////////////////////////////////////////////////////////////// -->

  <div class="card  mb-2   bg-abasas-dark  ">


    <hr class="sidebar-divider m-1 p-0 ">

    <!-- Nav Item - Dashboard -->
  
    <li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseExpenses" aria-expanded="true" aria-controls="collapseExpenses">
        <i class="fas fa-fw fa-cog"></i>
        <span>খরচ </span>
      </a>
      <div id="collapseExpenses" class="collapse" aria-labelledby="headingExpenses" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item" href="{{ route('daily-expenses.index') }}">দৈনিক খরচ</a>
          <a class="collapse-item" href="{{ route('monthly-expenses.index') }}">মাসিক খরচ</a>
          <a class="collapse-item" href="{{ route('yearly-expenses.index') }}">বার্ষিক খরচ</a>

        </div>
      </div>
    </li>

    <hr class="sidebar-divider m-1 p-0 ">

    <!-- Nav Item - Dashboard -->
   
    <li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
        <i class="fas fa-fw fa-cog"></i>
        <span>রিপোর্ট </span>
      </a>
      <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('sale-stats').'?startDate=2020-01-01&endDate='}}{{now()}}">বিক্রয় রিপোর্ট</a>
          <a class="collapse-item" href="{{ route('purchase-stats').'?startDate=2020-01-01&endDate='}}{{now()}}">ক্রয় রিপোর্ট</a>
          <a class="collapse-item" href="{{ route('expense-stats').'?startDate=2020-01-01&endDate='}}{{now()}}">খরচ রিপোর্ট</a>

        </div>
      </div>
    </li>
    
    @if(Auth::user()->role_id==1)



    <hr class="sidebar-divider m-1 p-0 ">

    <!-- Nav Item - Dashboard -->
   
    <li class="nav-item">
      <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapseAccounting" aria-expanded="true" aria-controls="collapseAccounting">
        <i class="fas fa-fw fa-cog"></i>
        <span>হিসাব </span>
      </a>
      <div id="collapseAccounting" class="collapse" aria-labelledby="headingAccounting" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('daily-accounting').'?startDate=2020-01-01&endDate='}}{{now()}}"> দৈনিক হিসাব</a>
          <a class="collapse-item" href="{{ route('monthly-accounting').'?startDate=2020-01-01&endDate='}}{{now()}}"> মাসিক হিসাব</a>
          <a class="collapse-item" href="{{ route('yearly-accounting').'?startDate=2020-01-01&endDate='}}{{now()}}">বার্ষিক হিসাব</a>

        </div>
      </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item  ">
      <a class="nav-link p-3 " href="{{ route('goals.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>লক্ষ্যমাত্রা</span></a>
    </li>
    @endif
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