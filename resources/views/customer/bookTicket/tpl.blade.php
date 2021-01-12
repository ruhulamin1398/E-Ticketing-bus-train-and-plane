@extends('customer.includes.app')

@section('content')







<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-12 col-md-6    ">
         

            <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

                    <h3 class="text-white"> Cart</h3>
                    <div class="card-body ">




                        <form>
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-6 col-md-6">
                                    <span class=" pl-2"> Type</span>
                                  
                                    <select class="form-control form-control" name="seat_type_id" id='seatTypeDropdown' required>
                                      
                                     
                                    </select>
                                
                                </div>
                                <div class="col-6 col-md-6">

                                    <span class=" pl-2">Total Ticket</span>
                                    <select class="form-control form-control" name="total_ticket" id='total_ticket_number' required>
                                        
                                    </select>
                                </div>


                                <div class="col-6 col-md-6" style="display: none;" id="total_ticket_cost_div" >
                                   
                                    <span class=" pl-2"> Cost</span>
                                  
                                    <input type="text" class="form-control form-control" id="total_ticket_cost"  readonly>
                                      
                                </div>
                                <div class="col-6 col-md-6 p-4" >
                                        <button class=" btn btn-success btn-lg btn-block p-2 " id="ticketSubmitBtn" type="button" style="display: none;" >Submit</button >
                                </div>
                              



                            </div>

                        </form>










                    </div>




                </div>
            </div>


        </div>

        <!-- Left Sidebar Start -->
        <div class="col-12 col-md-6   ">





        



            <div class=" mb-4  text-center   p-2 ">
                <div class="card      p-2">
                    <div class="card-header bg-dark-color">

                        <h3 class="text-white "> Available Ticket List</h3>
                    </div>
                    <div class="card-body" >




                        <table class="table    bg-dark-color" width="100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>price</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>

                            <tbody id='scheduleTicketList'>

                            </tbody>
                        </table>











                    </div>




                </div>
            </div>



        </div>
    </div>
</div>
<!-- Content Row -->






<form action="{{ route('tpl-schedule-seat') }}" method="post" id="ticketSubmitForm">

    @csrf
    <input type="number" name="tpl_schedule_id" id="tpl_schedule_id"  value="{{ $schedule->id }}" hidden  >

    <input type="number" name="tpl_total_seat" id="tpl_total_seat"  hidden  >
    
    <input type="number" name="tpl_seat_id" id="tpl_seat_id"  hidden  >

    <input type="text" value="{{ Auth::user()->name }}" name="name" id="ticketCartPassengerNameInput"  hidden  >
    <input type="text"  value="{{ Auth::user()->phone }}"  name="phone" id="ticketCartPassengerPhoneInput"  hidden  >
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

    
                            <h3 class="text-white " id="companyOnTicket"> {{ $schedule->company->name }}</h3>
                        </div>
                        <div class="card-body" >
                                
                        <table class="table   table-striped  " width="100%">
                            
                            <tbody class="text-dark">

                                <tr>
                                    <td> Passenger Name : </td>
                                    <td id="passengerNameOnTicket">{{ Auth::user()->name }} </td>
                                </tr>
                                <tr>
                                    <td> Passenger Phone : </td>
                                    <td id="passengerPhoneOnTicket">{{ Auth::user()->phone }}</td>
                                </tr>
                                <tr>
                                    <td> Schedule : </td>
                                    <td id="scheduleOnTicket">{{ $schedule->schedule }}</td>
                                </tr>
                                <tr>
                                    <td> From : </td>
                                    <td id="fromDestinationOnTicket">{{ $schedule->from_destination }} </td>
                                </tr>
                                <tr>
                                    <td> To : </td>
                                    <td id="toDestinationOnTicket">{{ $schedule->to_destination }}  </td>
                                </tr>
                                <tr>
                                    <td> Seats : </td>
                                    <td id="SeatsOnTicket"> </td>
                                </tr>

                            </tbody>
                        </table>
                        </div>
    
    
    
    
                    </div>

                    <button class="btn btn-success text-white"> <a href="" >  Print </a> </button>

                  </div>

                </div>
              </div>
 </div>



<script>

$(document).ready(function () {


var cartArray = {};
var ticketCost = 0;;
var scheduleSeatData ;
var schedule = @json($schedule);


$(document).on('click','#ticketSubmitBtn',function(){
    var data = $('#ticketSubmitForm').serialize();
    var action =  $('#ticketSubmitForm').attr('action');
    $.ajax({
            type: 'POST',
            url: action,
            data: data,
            success: function (successData) {
                $('#SeatsOnTicket').text(successData.seats_name);
                $("#create-ticket-reload-modal").modal();


                
            },
            error: function (data) {
            alert('Error');
            console.log(data);
            },
        });

});














$(document).on('input','#seatTypeDropdown',function(){
    
    var seat_id = $('#seatTypeDropdown').val()
    $('#tpl_seat_id').val(seat_id);
    console.log(scheduleSeatData);
    jQuery.each(scheduleSeatData,function(i){
        if(scheduleSeatData[i].id == seat_id){
            ticketCost = scheduleSeatData[i].cost;
            var htmlSeat = '';
            htmlSeat += '<option selected disabled>Select Seat </option>';
            if(scheduleSeatData[i].seat >1){
                htmlSeat += '<option value="1"> 1 </option>';
                htmlSeat += '<option value="2"> 2 </option>';
            }
            if(scheduleSeatData[i].seat == 1){
                htmlSeat += '<option value="1"> 1 </option>';
            }
            $('#total_ticket_number').html(htmlSeat);
        }

    });

});



$(document).on('input','#total_ticket_number',function(){
    var totalSeat = $('#total_ticket_number').val();
    
    $('#total_ticket_cost').val(ticketCost*totalSeat);
    $('#tpl_total_seat').val(totalSeat);
    $('#ticketSubmitBtn').show();
    $('#total_ticket_cost_div').show();

});









function printScheduleSeat(){
  var home = "{{route('home')}}";  
  var link = home.trim() + "/tpl-schedule-available-seat-list?tpl_schedule_id=" + schedule.id;
  console.log("link")
  console.log(link)
  console.log("link")

  $.get(link, function (data, status) {
    console.log("data");
    console.log(data);
    scheduleSeatData = data ;
html='';
dropdown="  <option selected disabled>Select Seat </option>";
    jQuery.each(data,function(key,value){
        
        html +=' <tr>' ;
        html += '<td class="  word-break ">'+ key+'</td>';
        html += '<td class="  word-break ">Tk '+ value.cost+'</td>';
        html += '<td class="  word-break "> '+ value.seat+'</td>';
        html += '</tr>';
       
dropdown+=" <option value="+ value.id + "> "+ key +"  </option>"

    });
   
    

    $("#scheduleTicketList").html(html);
    $("#seatTypeDropdown").html(dropdown);

  });
}

    printScheduleSeat();

        $('#ticketSubmitBtn').hide();
        $('#total_ticket_cost_div').hide();
        $("#seatTypeDropdown").html('');
        $('#total_ticket_number').html('');



  });


</script>







@endsection