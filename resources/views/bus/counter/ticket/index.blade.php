
@extends('bus.counter.includes.app')

@section('content')

<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">
         

            <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

                    <h3 class="text-white"> Passenger information</h3>

                    <div class="card-body ">

                        <form>
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-12">
                                    <span class=" pl-2"> Name</span>
                                    <input type="text" class="form-control mb-2" id="ticketCartPassengerName" required>
                                </div>
                                <div class="col-12">

                                    <span class=" pl-2">phone</span>
                                    <input type="text" class="form-control mb-2" id="ticketCartPassengerPhone" required>
                                </div>



                            </div>

                        </form>


                    </div>




                </div>
            </div> 



            <div class=" mb-4  text-center   p-2 ">
                <div class="card      p-2">
                    <div class="card-header bg-dark-color">

                        <h3 class="text-white "> Seat Plan</h3>
                    </div>
                    <div class="card-body" >




                        <table class="table  table-borderless  bg-dark-color" width="100%">

                            <tbody id='seatPlanBody'>

                            </tbody>
                        </table>











                    </div>




                </div>
            </div>



        </div>

        <!-- Left Sidebar Start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">





            <div class=" mb-4  text-center  bg-dark-color p-2 ">
                <div class="card border-none   bg-dark-color    p-2">
                    <h3 class="text-white"> Schedule</h3>

                    <div class="card-body">





                        <div class="col-auto">


                            {{-- <span class="text-light pl-2">Schedule</span> --}}

                            <select class="form-control form-control" name="road_id" id='schedulePassengerPageSelectSchedule' required>
                                <option selected disabled>Select Schedule </option>
                                @foreach ($schedules as $schedule)
                                <option value={{$schedule->id}}> {{$schedule->destinations->name }} - {{$schedule->schedule }}  </option>
                                @endforeach
                            </select>

                        </div>
                        








                    </div>




                </div>
            </div>


             <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

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






<form action="{{route('bus.bus-seats')}}" method="post" id="ticketSubmitForm">

    @csrf
    <input type="number" name="bus_seat_id" id="cart_bus_seat_id"  hidden  >
    <input type="number" name="schedule_id" id="cart_schedule_id"  hidden  >

    <input type="text" value=" @if(!Auth::guest()){{Auth::user()->name}} @endif " name="name" id="ticketCartPassengerNameInput"  hidden  >
    <input type="text"  value=" @if(!Auth::guest()) {{Auth::user()->phone}} @endif "  name="phone" id="ticketCartPassengerPhoneInput"  hidden  >

</form>




<!-- Create new product -->
<div class=" modal fade" id="create-ticket-reload-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="edit-modal-label "> Ticket Buy Completed</h5>
                    </button>
                  </div>
                  <div class="modal-body" id="attachment-body-content">


                    <button class="btn btn-success text-white"> <a href="" >  Reload </a> </button>

                  </div>

                </div>
              </div>
 </div>



<script>

$(document).ready(function () {


var cartArray = {};
var ticketCost = 0;;

     function showCart() {
        var html = "";
        var totalCost = 0;
        var cartArrayLenth = 0;
        jQuery.each(cartArray, function (data) {
        totalCost += ticketCost;
        cartArrayLenth++;

        html += ' <tr class=" text-light ">';
        html += ' <td>' + cartArray[data].name + '</td>';
        html += ' <td>' + ticketCost + '</td>';
        html += ' <td>    <button type="button" class="btn btn-danger" id="delete-cart-seat" data-id="' + data + '" > <i class="fa fa-trash" aria-hidden="false"> </i></button></td>';
        html += ' </tr>';
        });
        html += ' <tr >';
        html += ' <td></td>';
        html += ' <th> Total</th>';
        html += ' <td> ' + totalCost + '  </td>';
        html += ' </tr>';

        html += ' <tr >';
        html += ' <td></td>';
        html += ' <th> </th>';
        html += ' <td>  <button type="button" class="btn btn-success" id="submit-cart-seat"  > Submit </button>  </td>';
        html += ' </tr>';


        if (cartArrayLenth > 0)
        $('#cartBody').html(html);
        else

        $('#cartBody').html("<tr><td rowspan='5'>No Ticket Selected </td> </tr>");


    }





            
    $("#ticketCartPassengerName").change(function () {

         $("#ticketCartPassengerNameInput").val($("#ticketCartPassengerName").val());

    });

    $("#ticketCartPassengerPhone").change(function () {

          $("#ticketCartPassengerPhoneInput").val($("#ticketCartPassengerPhone").val());

    });






    $(document).on('input','#schedulePassengerPageSelectSchedule',function(){
        var home = "{{ route('home') }}";



        
        var link = home.trim() + "/bus/bus-schedule-api?schedule_id=" + $("#schedulePassengerPageSelectSchedule").val();
        $.get(link, function (data, status) {
        ticketCost = data.cost;
        cartArray = {};

        $("#seatPlanBody").html('');
        showCart();
        });


    
        var link = home.trim() + "/bus/bus-schedule-seat?schedule_id=" + $("#schedulePassengerPageSelectSchedule").val();

        $.get(link, function (data, status) {
            
        console.log(data);
        var html = "";
        html += '<tr>';
        html += '<td></td>';
        html += '<td></td>';
        html += '<td></td>';
        html += '<td></td>';
        html += '<td> </td>';
        html += ' <td style="height: 60px;"> <span class="h3">Driver</span> </td>';
        html += '</tr>';

        var j = 0;
        for (var i = 1; i <= 9; i++) {
            html += '  <tr>'


            html += '  <td><button class="btn btn-success seat"';
            if (data[j].status_id != 1) {
            html += 'disabled ';
            };
            html += 'schedule_id= "' + data[j].schedule_id + '"';
            html += 'id="' + data[j].id + '"';
            html += '>' + data[j++].seat_name + ' </button></td>';



            html += '  <td><button class="btn btn-success seat"';
            if (data[j].status_id != 1) {
            html += 'disabled ';
            };

            html += 'schedule_id= "' + data[j].schedule_id + '"';
            html += 'id="' + data[j].id + '"';

            html += '>' + data[j++].seat_name + '</button></td>';



            html += '  <td></td>';
            html += '  <td></td>';


            html += '  <td><button class="btn btn-success seat"';
            if (data[j].status_id != 1) {
            html += 'disabled ';
            };

            html += 'schedule_id= "' + data[j].schedule_id + '"';
            html += 'id="' + data[j].id + '"';

            html += '> ' + data[j++].seat_name + ' </button></td>';



            html += '  <td><button class="btn btn-success seat"';
            if (data[j].status_id != 1) {
            html += 'disabled ';
            };


            html += 'schedule_id= "' + data[j].schedule_id + '"';
            html += 'id="' + data[j].id + '"';

            html += '> ' + data[j++].seat_name + ' </button></td>';



            html += '</tr>';
        }

        $("#seatPlanBody").html(html);

        });


    });

        
    $("body").on("click", ".seat", function () {

        var id = $(this).attr('id');
        var schedule_id = $(this).attr('schedule_id');
        var name = $(this).text();

        cartArray[id] = {
        schedule_id: schedule_id,
        name: name,
        bus_set_id: id,

        };
        showCart();
    });


    $("body").on("click", "#delete-cart-seat", function () {

        var id = $(this).attr('data-id');

        delete cartArray[id];
        showCart();
    });



    
  $("body").on("click", "#submit-cart-seat", function () {
        jQuery.each(cartArray, function (i) {
        $('#cart_bus_seat_id').val(cartArray[i].bus_set_id);
        $('#cart_schedule_id').val(cartArray[i].schedule_id);



        var OPfrm = $('#ticketSubmitForm');
        var act = OPfrm.attr('action');
        $.ajax({
            type: OPfrm.attr('method'),
            url: act,
            data: OPfrm.serialize(),
            success: function (successData) {
            console.log(successData);
            },
            error: function (data) {
            console.log("can not add ticket ");
            console.log(data);
            },
        });


        });


        $("#create-ticket-reload-modal").modal();
    });














});


</script>


@endsection