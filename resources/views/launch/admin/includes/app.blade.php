<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E Ticket</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('file/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('file/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <!-- Custom style-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style type="text/css">
    .bg-dark-color{
        background-color:#2a3f5c;
        color: #fff;


    }
</style>

</head>











    <body id="page-top">

  

        
            <!-- Page Wrapper -->
            <div id="wrapper">
        
        
                @include('superAdmin.includes.sidebar')
           
        
            
        
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
        
                    <!-- Main Content -->
                    <div id="content">
        
                        
                        @include('superAdmin.includes.nav')
        
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
        
                            @yield('content')
        
                    </div>
                    <!-- End of Main Content -->
        
                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <p >Developed By <a target="_blank" href="#"> <span class="font-weight-bold text-success">E - Ticket</span> </a>
                                </p>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->
        
                </div>
                <!-- End of Content Wrapper -->
        
            </div>
            <!-- End of Page Wrapper -->
        
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        
        
        
          
        














    {{---- @include('layout.footer') -----}}


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('file/jquery/jquery.min.js')}}"></script>


    <script src="{{asset('file/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('file/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('file/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>



    <!-- Page level plugins -->
    <script src="{{asset('file/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('file/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @yield('JavaScript')
    
    <script src="{{asset('js/custom/counter.js')}}"></script>
    <script src="{{asset('js/custom/road.js')}}"></script>
    <script src="{{asset('js/custom/schedule.js')}}"></script>
    <script src="{{asset('js/custom/ticketCart.js')}}"></script>
    <script src="{{asset('js/custom/scheduleTickets.js')}}"></script>
@yield('js')


</body>

</html>