@extends('customer.includes.app')

@section('content')


<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">
         




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



            {{-- #schedulePassengerPageSelectSchedule --}}

          


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






<form action="{{route('bus.bus-seats')}}" method="POST" id="ticketSubmitForm">

    @csrf
    <input type="number" name="bus_seat_id" id="cart_bus_seat_id"  hidden  >
    <input type="number" name="schedule_id" id="cart_schedule_id" value="{{ $schedule->id }}"  hidden  >

    <input type="text" value="{{ Auth::user()->name }}" name="name"  hidden  >
    <input type="text"  value="{{ Auth::user()->phone }}"  name="phone"   hidden  >
    <input type="text"  value="{{ Auth::user()->id }}"  name="user_id"   hidden  >

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

                    <div class="card      p-2">
                        <div class="card-header bg-dark-color">

    
                            <h3 class="text-white "> {{ $schedule->companies->name }}</h3>
                        </div>
                        <div class="card-body" >
                                
                        <table class="table   table-striped  " width="100%">
                            
                            <tbody class="text-dark">

                                <tr>
                                    <td> Passenger Name :  </td>
                                    <td id="passengerNameOnTicket"> {{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td> Passenger Phone :</td>
                                    <td id="passengerPhoneOnTicket">{{ Auth::user()->phone }}</td>
                                </tr>
                                <tr>
                                    <td> Schedule : </td>
                                    <td id="scheduleOnTicket">{{ $schedule->schedule }}</td>
                                </tr>
                                <tr>
                                    <td> From : </td>
                                    <td id="fromDestinationOnTicket">{{ $schedule->destinations->name }} </td>
                                </tr>
                                <tr>
                                    <td> To : </td>
                                    <td id="toDestinationOnTicket">{{  $schedule->fromDestinations->name }} </td>
                                </tr>
                                <tr>
                                    <td> Seats : </td>
                                    <td id="SeatsOnTicket"> </td>
                                </tr>

                            </tbody>
                        </table>
                        </div>
    
    
    
    
                    </div>


                    <a href="" ><button class="btn btn-success text-white">   Print  </button></a>

                  </div>

                </div>
              </div>
 </div>



<script>

$(document).ready(function () {

var schedule ;
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








   




        var home = "{{ route('home') }}";
        var scheduleData = @json($schedule);
        ticketCost = scheduleData.cost;
        console.log(ticketCost);
        cartArray = {};

        $("#seatPlanBody").html('');

        showCart();
    
        var link = home.trim() + "/bus/bus-schedule-seat?schedule_id=" +scheduleData.id;

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
        var ticketLists = '';
        jQuery.each(cartArray, function (i) {
        ticketLists += cartArray[i].name + ','
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

        
        $('#SeatsOnTicket').text(ticketLists);
        $("#create-ticket-reload-modal").modal();
    });














});


</script>





@endsection