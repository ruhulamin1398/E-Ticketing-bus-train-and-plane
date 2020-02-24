@extends('layout.app')

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('content')






<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">




            <div class=" mb-4  text-center   p-2 ">
                <div class="card     h-100 p-2">
                    <div class="card-header bg-abasas-dark">

                        <h3 class="text-white "> Seat Plan</h3>
                    </div>
                    <div class="card-body" id='busSeatPlan'>




                        <table class="table  table-borderless  bg-abasas-dark" width="100%">

                            <tbody id='busBody'>

                            </tbody>
                        </table>











                    </div>




                </div>
            </div>



        </div>

        <!-- Left Sidebar Start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">





            <div class=" mb-4  text-center  bg-abasas-dark p-2 ">
                <div class="card border-none   bg-abasas-dark  h-100 p-2">
                    <h3 class="text-white"> Location</h3>

                    <div class="card-body">





                        <div class="col-auto">


                            <span class="text-light pl-2">Road</span>

                            <select class="form-control form-control" name="road_id" id='homepageSelectRoad' required>
                                <option selected>Select Road </option>
                                @foreach ($roads as $road)
                                <option value={{$road->id}}> {{$road->from->name}} - {{$road->to->name}} </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-auto">


                            <span class="text-light pl-2">Schedule</span>

                            <select class="form-control form-control" name="schedule_id" id='homepageSelectSchedule' required>
                                <option selected>Select Schedule </option>

                            </select>

                        </div>








                    </div>




                </div>
            </div>


            <div class=" mb-4  text-center  bg-abasas-dark p-2  ">
                <div class="card border-none   bg-abasas-dark  h-100 p-2 ">

                    <h3 class="text-white"> Cart</h3>

                    <div class="card-body ">


                        <table class="table   table-striped  " width="100%">
                            <thead class=" text-light ">
                                <th>Seats</th>
                                <th>price</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="text-light" id='cartBody'>



                            </tbody>
                        </table>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->









@endsection